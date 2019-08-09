[TOC]

- Data
- Api

## Timer Handle

- 定时器

## Data
```c
// uv_handle_type
uv_timer_t 

// callback
void (*uv_timer_cb)(uv_time_t* handle)
```

## Api
```
//初始定时器
int uv_timer_init(uv_loop_t* loop,uv_timer_t* handle)

//启动定时器 timeout 延迟多少s执行,repeat 间隔多少s执行
int uv_timer_start(uv_timer_t* handle,uv_timer_cb cb,uint64_t timeout,uint64_t repeat)

// 关闭定时器
int uv_timer_stop(uv_timer_t* handle)
int uv_timer_again(uv_timer_t* handle)
void uv_timer_set_repeat(uv_timer_t* handle,uint64_t repeat）
uint64_t uv_timer_get_repeat(const uv_timer_t* handle
```
