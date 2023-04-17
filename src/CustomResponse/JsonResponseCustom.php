<?php

namespace App\CustomResponse;

use Symfony\Component\HttpFoundation\JsonResponse;

class JsonResponseCustom extends JsonResponse
{
    public function __construct(array $meta, array $data, array $links, int $status = 200, array $headers = [])
    {
        parent::__construct(['meta' => $meta, 'data' => $data, 'links' => $links], $status, $headers);
    }
}
