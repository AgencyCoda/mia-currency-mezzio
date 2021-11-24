<?php

namespace Mia\Currency\Model;

/**
 * Description of Model
 * @property int $id ID of item
 * @property mixed $title Description for variable
 * @property mixed $code Description for variable
 * @property mixed $symbol Description for variable
 * @property mixed $val_usd Description for variable
 * @property mixed $photo Description for variable

 *
 * @OA\Schema()
 * @OA\Property(
 *  property="id",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="title",
 *  type="string",
 *  description=""
 * )
 * @OA\Property(
 *  property="code",
 *  type="string",
 *  description=""
 * )
 * @OA\Property(
 *  property="symbol",
 *  type="string",
 *  description=""
 * )
 * @OA\Property(
 *  property="val_usd",
 *  type="number",
 *  description=""
 * )
 * @OA\Property(
 *  property="photo",
 *  type="string",
 *  description=""
 * )

 *
 * @author matiascamiletti
 */
class MiaCurrency extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'mia_currency';
    
    //protected $casts = ['data' => 'array'];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;    
}