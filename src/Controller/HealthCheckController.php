<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class HealthCheckController
{
    public function __invoke(Request $request): JsonResponse
    {
        $version = $request->attributes->get('_api_version', 'v1');

        return new JsonResponse([
            'status'    => 'ok',
            'timestamp' => (new \DateTimeImmutable())->format(DATE_ATOM),
            'service'   => 'symfony-practice',
            'version'   => $version,
        ]);
    }
}
