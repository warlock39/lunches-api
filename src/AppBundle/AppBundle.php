<?php

namespace AppBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Swagger\Annotations as SWG;

/**
 * Class AppBundle.
 */
class AppBundle extends Bundle
{
    /**
     * @SWG\Info(
     *   title="Lunches API",
     *   description="REST API of Lunches platform e-commerce solution",
     *   version="1.0.0",
     *   @SWG\Contact(
     *     name="Lunches API Team",
     *     url="https://lunches.com.ua",
     *     email="support@lunches.com.ua",
     *   )
     * )
     * @SWG\Swagger(
     *     basePath="/",
     *     schemes={"http","https"},
     *     produces={"application/json"},
     *     consumes={"application/json"},
     *     swagger="2.0",
     * )
     * @SWG\Definition(
     *     definition="Error",
     *     required={"code", "message"},
     *     @SWG\Property(
     *         property="code",
     *         type="integer",
     *     ),
     *     @SWG\Property(
     *         property="message",
     *         type="string"
     *     ),
     *     @SWG\Property(
     *         property="errors",
     *         type="array",
     *     )
     * )
     * @SWG\Parameter(
     *     name="accessToken",
     *     in="query",
     *     description="Authentication token to access restricted resources",
     *     required=true,
     *     type="string",
     * ),
     * @SWG\Parameter(
     *     name="dishId",
     *     in="path",
     *     description="ID of dish",
     *     required=true,
     *     type="integer",
     * ),
     * @SWG\Parameter(
     *     name="imageId",
     *     in="path",
     *     description="ID of image",
     *     required=true,
     *     type="string",
     * ),
     */
}
