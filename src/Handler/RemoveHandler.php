<?php

namespace Mia\Currency\Handler;

use Mia\Core\Exception\MiaException;

/**
 * Description of RemoveHandler
 * 
 * @OA\Get(
 *     path="/mia_currency/remove/{id}",
 *     summary="MiaCurrency Revove",
 *     tags={"MiaCurrency"},
 *     @OA\Parameter(
 *         name="id",
 *         description="Id of Item",
 *         required=true,
 *         in="path"
 *     ),
 *     @OA\Response(
 *          response=200,
 *          description="successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/MiaJsonResponse")
 *     ),
 *     security={
 *         {"bearerAuth": {}}
 *     },
 * )
 *
 * @author matiascamiletti
 */
class RemoveHandler extends \Mia\Auth\Request\MiaAuthRequestHandler
{
    /**
     * 
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function handle(\Psr\Http\Message\ServerRequestInterface $request): \Psr\Http\Message\ResponseInterface 
    {
        // Obtenemos ID si fue enviado
        $itemId = $this->getParam($request, 'id', '');
        // Buscar si existe el item en la DB
        $item = \Mia\Currency\Model\MiaCurrency::find($itemId);
        // verificar si existe
        if($item === null){
            throw new MiaException('not exist');
        }
        $item->deleted = 1;
        $item->save();
        // Devolvemos respuesta
        return new \Mia\Core\Diactoros\MiaJsonResponse(true);
    }
}