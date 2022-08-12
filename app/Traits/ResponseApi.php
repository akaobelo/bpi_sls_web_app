<?php
/********************************************************************************************
* Module Name           : ResponseApi
* Author                : Arven Jay Abelo
* Date Created          :
* Notes                 :
*
*                                COPYRIGHT 2022 | DSG SONS INC (ICT)
*********************************************************************************************/
namespace App\Traits;


trait ResponseApi
{
    /**
     * Core of response
     *
     * @param   string          $message
     * @param   array|object    $data
     * @param   integer         $statusCode
     * @param   boolean         $isSuccess
     *
     * @return json
     */
    private function coreResponse($message, object|array $data = null, $statusCode, bool $isSuccess = true)
    {

        if(is_string($statusCode) || $statusCode === 0)$statusCode = 500;

        if(!$message) return response()->json(['message' => 'Message is required'], 500);

        if($isSuccess)
        {
            return response()->json([
                'message'   => $message,
                'success'   => true,
                'code'      => $statusCode,
                'data'      => $data
            ], $statusCode);
        } else
        {
            return response()->json([
                'message'   => $message,
                'success'   => false,
                'code'      => $statusCode,
            ], $statusCode);
        }
    }


   /**
     * Send any success response
     *
     * @param   string          $message
     * @param   array|object    $data
     * @param   integer         $statusCode
     *
     * @return json
     */
    public function success($message, object|array $data = null,  $statusCode = 200)
    {
        return $this->coreResponse($message, $data, $statusCode);
    }

    /**
     * Send any error response
     *
     * @param   string          $message
     * @param   integer         $statusCode
     *
     * @return json
     */
    public function error($message,  $statusCode = 500)
    {
        return $this->coreResponse($message, null, $statusCode, false);
    }

    /**
     * Send response with meta pagination
     *
     * @param object $meta
     * @param integer $total
     * @param App\Models\Requisition $data
     *
     * @return json
     */
    public function paginateRespone($meta,$total,$data)
    {

        return response()->json([
            'meta' => [
                'page'      => intval($meta['page']),
                'pages'     => intval(isset($meta['pages']) ?? 1),
                'perpage'   => intval($meta['perpage']),
                'total'     => $total,
                'sort'      => 'desc'
            ],
            'data' => $data
        ]);
    }


}
