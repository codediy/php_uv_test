[TOC]
- Loop    (Loop)      事件循环主题
- Handle  (Element)   事件宿主
- Request (Event)     事件

## Loop
```
uv_loop_t
uv_run_mode
void (*uv_walk_cb) (uv_handle_t* handle,void*arg)
void* uv_loop_t.data
```

```
int uv_loop_init(uv_loop_t* loop)
int uv_loop_configure(uv_loop_t* loop,uv_loop_option option,...)
int uv_run(uv_loop_t* loop,uv_run_mode mode)
void uv_stop(uv_loop_t* loop)
int uv_loop_close(uv_loop_t* loop)

int uv_loop_alive(const uv_loop_t* loop)
size_t uv_loop_size(void)
int uv_backend_fd(const uv_loop_t* loop)
int uv_backend_timeout(const uv_loop_t* loop)
uv_loop_t* uv_default_loop(void)
uinit64_t uv_now(const uv_loop_t* loop)
void uv_update_time(uv_loop_t* loop)
void uv_walk(uv_loop_t* loop,uv_walk_cb walk_cb,void* arg)
int uv_loop_fork(uv_loop_t* loop)
void* uv_loop_get_data(const uv_loop_t* loop)
void* uv_loop_set_data(uv_loop_t* loop,void* data)
```
## Handle
```
uv_handle_t
uv_handle_type
uv_any_handle

void(*uv_alloc_cb)(uv_handle_t* handle,size_t suggested_size,uv_buf_t* buf)
void (*uv_close_cb)(uv_handle_t* handle)

uv_loop_t* uv_handle_t.loop
uv_handle_type uv_handle_t.type
void* uv_handle_t.data
```

```
UV_HANDLE_TYPE_MAP(iter_macro)

int uv_is_active(const uv_handle_t* handle)
int uv_is_closing(const uv_handle_t* handle)

void uv_close(uv_handle_t* handle,uv_close_cb close_cb)

void uv_ref(uv_handle_t* handle)
void uv_unref(uv_handle_t* handle)

int uv_has_ref(const uv_handle_t* handle)
size_t uv_handle_size(uv_handle_type type)

int uv_send_buffer_size(uv_handle_t* handle,int*value)
int uv_fileno(const uv_handle_t* handle,uv_os_fd_t* fd)
uv_loop_t uv_handle_get_loop(const uv_handle_type* handle)

void uv_handle_get_data(const uv_handle_t* handle)
void uv_handle_set_data(const uv_handle_t* handle,void* data)

uv_handle_type uv_handle_get_type(const uv_handle_t* handle)
const char* uv_handle_type_name(uv_handle_type type)
```

## Request
```
uv_req_t
uv_any_req

uv_req_type uv_req_t.type
void* uv_req_t.data
```

```
UV_REQ_TYPE_MAP(iter_macro)


size_t uv_req_size(uv_req_type type)
int uv_cancel(uv_req_t* req)
void* uv_req_get_data (const uv_req_t* req)
void* uv_req_set_data(uv_req_t* req,void* data)

uv_req_type uv_req_get_type(const uv_req_t* req)
const char* uv_req_type_name(uv_req_type type)
```