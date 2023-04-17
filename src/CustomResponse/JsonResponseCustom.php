<?php

namespace App\CustomResponse;

use Symfony\Component\HttpFoundation\JsonResponse;

class JsonResponseCustom
{
    public function send(array $meta, array $data, array $links, int $status = 200, array $headers = []): JsonResponse
    {
        return new JsonResponse(['meta' => $meta, 'data' => $data, 'links' => $links], $status, $headers);
    }
}
