use sqlx::prelude::FromRow;

#[derive(Debug, Default, FromRow)]
pub struct User {
    user_id: i64,
    username: String,
    password_hash: String,
    email: String,
    is_email_verified: bool,
    created_at: chrono::DateTime<chrono::Utc>,
}

#[derive(Debug, Default, FromRow)]
pub struct Manufacturer {
    Manufacturer_id: i64,
    name: String,
    slug: String,
    description: Option<String>,
    website: Option<String>,
    created_by: Option<i64>,
    created_at: chrono::DateTime<chrono::Utc>,
}
