<?php

namespace Mia\Currency\Handler;

/**
 * Description of SaveHandler
 * 
 * @OA\Post(
 *     path="/mia_currency/save",
 *     summary="MiaCurrency Save",
 *     tags={"MiaCurrency"},
*      @OA\RequestBody(
 *         description="Object",
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(ref="#/components/schemas/MiaCurrency")
 *         )
 *     ),
 *     @OA\Response(
 *          response=200,
 *          description="successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/MiaCurrency")
 *     ),
 *     security={
 *         {"bearerAuth": {}}
 *     },
 * )
 *
 * @author matiascamiletti
 */
class SaveHandler extends \Mia\Auth\Request\MiaAuthRequestHandler
{
    /**
     * 
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function handle(\Psr\Http\Message\ServerRequestInterface $request): \Psr\Http\Message\ResponseInterface 
    {
        // Obtener item a procesar
        $item = $this->getForEdit($request);
        // Guardamos data
        $item->title = $this->getParam($request, 'title', '');
        $item->code = $this->getParam($request, 'code', '');
        $item->symbol = $this->getParam($request, 'symbol', '');
        $item->val_usd = $this->getParam($request, 'val_usd', '');
        $item->photo = $this->getParam($request, 'photo', '');        
        
        try {
            $item->save();
        } catch (\Exception $exc) {
            return new \Mia\Core\Diactoros\MiaJsonErrorResponse(-2, $exc->getMessage());
        }

        // Devolvemos respuesta
        return new \Mia\Core\Diactoros\MiaJsonResponse($item->toArray());
    }
    
    /**
     * 
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return \App\Model\MiaCurrency
     */
    protected function getForEdit(\Psr\Http\Message\ServerRequestInterface $request)
    {
        // Get Item ID
        $itemId = $this->getParam($request, 'id', '');
        // Verify exist param
        if($itemId == ''){
            return new \Mia\Currency\Model\MiaCurrency();
        }
        // Buscar si existe el item en la DB
        $item = \Mia\Currency\Model\MiaCurrency::find($itemId);
        // verificar si existe
        if($item === null){
            return new \Mia\Currency\Model\MiaCurrency();
        }
        // Devolvemos item para editar
        return $item;
    }
}