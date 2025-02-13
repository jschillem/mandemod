use std::time::Duration;

use axum::{response::Html, routing::get, Router};
use sqlx::sqlite::SqlitePoolOptions;
use tracing_subscriber::{layer::SubscriberExt, util::SubscriberInitExt};

mod db;

#[tokio::main]
async fn main() {
    tracing_subscriber::registry()
        .with(
            tracing_subscriber::EnvFilter::try_from_default_env()
                .unwrap_or_else(|_| format!("{}=debug", env!("CARGO_CRATE_NAME")).into()),
        )
        .with(tracing_subscriber::fmt::layer())
        .init();

    let db_connection_str =
        std::env::var("DATABASE_URL").unwrap_or_else(|_| format!("sqlite://modular.db"));

    let pool = SqlitePoolOptions::new()
        .max_connections(5)
        .acquire_timeout(Duration::from_secs(3))
        .connect(&db_connection_str)
        .await
        .expect("Failed to connect to the database");

    let app = Router::new().route("/", get(handler)).with_state(pool);

    let listener = tokio::net::TcpListener::bind("127.0.0.1:3000")
        .await
        .expect("Failed to bind TCP listener");

    println!("Listening on http://localhost:3000");
    axum::serve(listener, app)
        .await
        .expect("Failed to start server");
}

async fn handler() -> Html<&'static str> {
    Html("<h1>Hello, world!</h1>")
}
