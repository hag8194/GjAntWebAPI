<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 24/12/2016
 * Time: 12:45 PM
 */

namespace api\modules\v1\models;

use common\models\ClientWallet;

class ClientWalletAPI extends ClientWallet
{
    /**
     * @inheritdoc
     */
    public function fields()
    {
        return [
            'id',
            'client'
        ];
    }

    /**
     * @inheritdoc
     */
    public function extraFields()
    {
        return [

        ];
    }
}