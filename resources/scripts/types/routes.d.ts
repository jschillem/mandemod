import "momentum-trail"

declare module "momentum-trail" {
    export interface RouterGlobal {"url":"http:\/\/localhost:8000","port":8000,"defaults":[],"routes":{"home":{"uri":"\/","methods":["GET","HEAD"]},"storage.local":{"uri":"storage\/{path}","methods":["GET","HEAD"],"wheres":{"path":".*"},"parameters":["path"]}},"wildcards":{"storage.*":[]}}
}