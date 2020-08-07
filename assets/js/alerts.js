(function ($) {
    showSwal = function (type, title, message) {
        'use strict';
        if (type === 'error') {
            swal({
                title: title,
                text: message,
                icon: 'warning',
                button: {
                    text: "OK",
                    value: true,
                    visible: true,
                    className: "btn btn-primary"
                }
            })

        } else if (type === 'success') {
            swal({
                title: title,
                text: message,
                icon: 'success',
                button: {
                    text: "OK",
                    value: true,
                    visible: true,
                    className: "btn btn-primary"
                }
            })

        } else if (type === 'info') {
            swal({
                title: title,
                text: message,
                icon: 'info',
                buttons: {
                    cancel: {
                        text: "Cancel",
                        value: null,
                        visible: true,
                        className: "btn btn-danger",
                        closeModal: true,
                    },
                    confirm: {
                        text: "OK",
                        value: true,
                        visible: true,
                        className: "btn btn-primary info_swal_ok",
                        closeModal: false,
                    }
                }
            })

        } else if (type === 'success-message') {
            swal({
                title: 'Approve Payment!',
                text: 'Once Approved it can not be cancelled',
                icon: 'success',
                content: {
                    element: "textarea",
                    attributes: {
                        placeholder: "Type your reason",
                        class: 'form-control',
                        rows: 5,
                        id: 'payment_comment'
                    },
                },
                button: {
                    text: "Approve",
                    value: true,
                    visible: true,
                    className: "btn btn-primary payment_action",
                    closeModal: false,
                }
            })

        } else if (type === 'auto-close') {
            swal({
                title: 'Auto close alert!',
                text: 'I will close in 2 seconds.',
                timer: 2000,
                button: false
            }).then(
                    function () {
                    },
                    // handling the promise rejection
                            function (dismiss) {
                                if (dismiss === 'timer') {
                                    console.log('I was closed by the timer')
                                }
                            }
                    )
                } else if (type === 'warning-message-and-cancel') {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3f51b5',
                cancelButtonColor: '#ff4081',
                confirmButtonText: 'Great ',
                content: {
                    element: "textarea",
                    attributes: {
                        placeholder: "Type your reason",
                        class: 'form-control',
                        rows: 5,
                        id: 'payment_comment',
                    },
                },
                buttons: {
                    cancel: {
                        text: "Cancel",
                        value: null,
                        visible: true,
                        className: "btn btn-danger payment_reject",
                        closeModal: true,
                    },
                    confirm: {
                        text: "OK",
                        value: true,
                        visible: true,
                        className: "btn btn-primary payment_action",
                        closeModal: false,
                    }
                }
            })

        } else if (type === 'reject-warning-message-and-cancel') {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3f51b5',
                cancelButtonColor: '#ff4081',
                confirmButtonText: 'Great ',
                content: {
                    element: "textarea",
                    attributes: {
                        placeholder: "Type your reason",
                        class: 'form-control',
                        rows: 5,
                        id: 'payment_comment',
                    },
                },
                buttons: {
                    cancel: {
                        text: "Cancel",
                        value: null,
                        visible: true,
                        className: "btn btn-danger btn-sm payment_reject",
                        closeModal: true,
                    },
                    confirm: {
                        text: "Save & Retain Plot",
                        value: true,
                        visible: true,
                        className: "btn btn-primary btn-sm payment_action",
                        closeModal: false,
                    },
                    catch : {
                        text: "Save & Free Plot",
                        value: true,
                        visible: true,
                        className: "btn btn-info btn-sm payment_action2",
                        closeModal: false,
                    }
                }
            })

        } else if (type === 'transaction_password') {
            swal({
                title: 'Transaction Password!',
                text: 'Enter your transaction password',
                content: {
                    element: "input",
                    attributes: {
                        placeholder: "Type your transaction password",
                        type: "password",
                        class: 'form-control transaction_password',
                        id: 'transaction_password'
                    },
                },
                button: {
                    text: "Submit",
                    value: true,
                    visible: true,
                    className: "btn btn-primary transaction_password_ok",
                    closeModal: false,
                }
            })
        }
    }

})(jQuery);