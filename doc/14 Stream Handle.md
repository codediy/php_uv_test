[TOC]
- DataTypes
- Api

## Stream
- Stream事件发生主体
- Listen 监听链接事件
- Read   监听数据可读事件


## Data
```$xslt
// uv_handle_type
uv_stream_t

// uv_req_type
uv_connect_t
uv_write_t
uv_shutdown_t

// callback
//connect初始回调
void (*uv_connect_cb)(uv_connect_t* req,int status)
//connect请求回调
void (*uv_connction_cb)(uv_stream_t* server,int status)
//read回调
void (*uv_read_cb)(uv_stream_t* stream ssize_t nread,const uv_buf_t* buf)
void (*uv_write_cb)(uv_write_t* req,int status)
void (*uv_shutdown_cb)(uv_shutdown_t* req,int status)

// public members
size_t uv_stream_t.write_queue_size
uv_stream_t* uv_connect_t.handle
uv_stream_t* uv_write.handle
uv_stream_t* uv_write_t.send_handle
uv_stream_t* uv_shutdown_t.handle
```
## Api

```$xslt
int uv_stream_set_blocking(uv_stream_t* handle,int blocking)
int uv_listen(uv_stream_t* stream,int backlog,uv_connectio_cb cb)
int uv_accept(uv_stream_t server,uv_stream_t* client)

int uv_read_start(uv_stream_t* stream,uv_alloc_cb allloc_cb,uv_read_cb read_cb)
int uv_read_stop(uv_stream_t* stream)

int uv_write(uv_write_t* req,uv_stream_t* handle,cosnt uv_buf_t bufs[],unsigned int nbufs,uv_write_cb cb)
int uv_write2(uv_write_t* req,uv_stream_t* handle,const uv_buf_t bufs[],unsigned int nbufs,uv_stream_t* send_handle,uv_write_cb cb)
int uv_try_wwrite(uv_stream_t* handle,const uv_buf_t bufs[],unsigned int nbufs)
int uv_is_readable(const uv_stream_t* handle)
int uv_is_writable(cosnt uv_stream_t* handle)

```
