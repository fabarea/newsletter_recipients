// jshint ;_;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * Module: Fab/NewsletterRecipients/Media
 */
define([
    'jquery',
    'TYPO3/CMS/Backend/Modal',
    'TYPO3/CMS/Backend/Notification'
], function($, Modal, Notification) {

    'use strict';

    var NewsletterRecipients = {


        /**
         * @return void
         */
        initialize: function() {

            // Add listener on bulk send button
            $(document).on('click', '.btn-edit-many-recipients', function(e) {

                e.preventDefault();

                Vidi.modal = Modal.advanced({
                    type: Modal.types.ajax,
                    // size: Modal.sizes.large,
                    title: TYPO3.l10n.localize('action.update'),
                    severity: top.TYPO3.Severity.notice,
                    content: decodeURIComponent($(this).attr('href')),
                    buttons: [
                        {
                            text: TYPO3.l10n.localize('close'),
                            btnClass: 'btn',
                            trigger: function() {
                                Modal.dismiss();
                            }
                        }
                    ],
                    ajaxCallback: function() {

                        // format modal title.
                        // var modalTitle = $('.modal-title', Vidi.modal).html();
                        // $('.modal-title', Vidi.modal).html(modalTitle);

                        /**
                         * Delete a selection in the form just opened in the popup.
                         */
                        $(Vidi.modal).on('submit', '#update-many-recipients', function(e) {

                            // Stop default behaviour.
                            e.preventDefault();


                            $('.modal-body', Vidi.modal).css('opacity', 0.6);
                            $('#btn-update-many-recipients', Vidi.modal).attr('disabled', 'disabled');

                            var $form = $(this).closest('form');

                            // Ajax request
                            $.ajax({
                                url: $($form).attr('action'),
                                data: $form.serialize(),
                                method: 'post',

                                /**
                                 * On success call back
                                 *
                                 * @param response
                                 */
                                success: function(response) {
                                    Vidi.grid.fnDraw(false); // false = for keeping the pagination.
                                    Notification.success('', response);
                                    Modal.dismiss();
                                }
                            });
                        });
                    }
                })

            });

        }

    };

    NewsletterRecipients.initialize();
    return NewsletterRecipients;
});
