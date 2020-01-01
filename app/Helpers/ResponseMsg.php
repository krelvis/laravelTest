<?php
/**
 * 返回成功请求
 *
 * @param string $data
 * @param string $msg
 * @param string $header
 * @param string $value
 * @return mixed
 */
{
    function responseSuccess($data = '', $msg = '成功', $jump_url = '', $Code = 200 ,$header = 'Content-Type', $value = 'application/json')
    {
        $msg = is_array($msg)?json_encode($msg):json_encode([$msg?:trans('response.success')]);
        $res['status']  = ['SuccessCode' => $Code, 'msg' => trans($msg)?trans($msg):$msg];
        $res['data']    = $data;
        $res['url']     = $jump_url;
        return response($content = $res, $status = 200)->header($header, $value);
    }

    /**
     * 返回错误的请求
     *
     * @param string $msg
     * @param int $code
     * @param string $data
     * @param string $header
     * @param string $value
     * @return mixed
     */
    function responseWrong($msg = '失败',  $data = '', $jump_url = '', $code = 1, $header = 'Content-Type', $value = 'application/json')
    {
        $msg = is_array($msg)?json_encode($msg):json_encode([$msg?:trans('response.fail')]);
        $res['status']  = ['errorCode' => $code, 'msg' => trans($msg)?trans($msg):$msg];
        $res['data']    = $data;
        $res['url']  = $jump_url;
        return response($content = $res, $status = 200)->header($header, $value);
    }
}