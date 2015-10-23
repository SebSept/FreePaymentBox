<?php

/**
 * Controlleur Retour du client sur le site
 * 
 * @author Sébastien Monterisi   <sebastienmonterisi@yahoo.fr>  https://github.com/SebSept/FreePaymentBox   
 * @author ?@?                   <?>                            https://github.com/PrestaMath
 */
class FreepaymentboxCustomerreturnModuleFrontController extends ModuleFrontController
{

    public $display_column_left = false;

    public function initContent()
    {
        parent::initContent();

        // 
        $status = Tools::getValue('status');
        $msg2 = '';

        switch ($status) {
            case 'PBX_REFUSE' :
                $msg = 'Une erreur est survenue lors du paiement.';
                $msg2 = 'Merci de recommencer.';
                break;
            case 'PBX_EFFECTUE' :
                $msg = 'Le paiement a été effectué. Votre commeande est en cours de traitement.';
                $msg2 = 'Nous vous remercions de votre confiance.';
                $this->context->cart->delete();
                break;
            case 'PBX_ANNULE' :
                $msg = 'Votre paiement a été annulé.';
                $msg2 = 'Merci de recommencer votre commande.';
                break;
            default :
                $msg = 'Une erreur est survenue lors du paiement';
                $msg2 = 'Merci de recommencer votre commande.';
                break;
        }

        $this->context->smarty->assign('msg', $msg);
        $this->context->smarty->assign('msg2', $msg2);

        $this->setTemplate('pbxcustomerreturn.tpl');
    }

}
