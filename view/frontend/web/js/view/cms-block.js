define(
    [
        'jquery',
        'ko',
        'uiComponent',
        'Magento_Ui/js/modal/modal',
        'Convert_CheckoutFaq/js/model/info-modal'
    ],
    function(
        $,
        ko,
        Component,
        modal,
        infoModal
    ) {
        'use strict';
        return Component.extend({
            defaults: {
                template: 'Convert_CheckoutFaq/cms-block'
            },

            initialize: function () {
                var self = this;
                this._super();
            },

            /**
             * Init modal window for rendered element
             *
             * @param {Object} element
             */
            initModal: function (element) {
                infoModal.createModal(element);
                console.log(window.checkoutConfig.t_checkout_block);
                jQuery(document).ready(function() {
                    jQuery('.extrafee-info-modal .modal-title').text(window.checkoutConfig.t_checkout_block);
                });
            },

            /**
             * Show agreement content in modal
             *
             * @param {Object} element
             */
            showContent: function (element) {
                
                infoModal.showModal();
            }


        });
    }
);
