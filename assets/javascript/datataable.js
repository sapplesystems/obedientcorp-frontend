function initDataTable() {
    $('#order-listing').DataTable({
        "aLengthMenu": [
            [5, 10, 15, -1],
            [5, 10, 15, "All"]
        ],
        "iDisplayLength": 10,
        "language": {
            search: ""
        }
    });
    $('#order-listing_filter [type=search]').attr('placeholder', 'Search');
}

function initDuePaymetListDataTable() {
    $('#due_payment_list').DataTable({
        "aLengthMenu": [
            [5, 10, 15, -1],
            [5, 10, 15, "All"]
        ],
        "iDisplayLength": 10,
        "language": {
            search: ""
        }
    });
    $('#due_payment_list_filter [type=search]').attr('placeholder', 'Search');
}

function initPendingPaymetListDataTable() {
    $('#pending_payment_list').DataTable({
        "aLengthMenu": [
            [5, 10, 15, -1],
            [5, 10, 15, "All"]
        ],
        "iDisplayLength": 10,
        "language": {
            search: ""
        }
    });
    $('#pending_payment_list_filter [type=search]').attr('placeholder', 'Search');
}

function initApprovedPaymetListDataTable() {
    $('#approved_payment_list').DataTable({
        "aLengthMenu": [
            [5, 10, 15, -1],
            [5, 10, 15, "All"]
        ],
        "iDisplayLength": 10,
        "language": {
            search: ""
        }
    });
    $('#approved_payment_list_filter [type=search]').attr('placeholder', 'Search');
}

function initRejectedPaymetListDataTable() {
    $('#reject_payment_list').DataTable({
        "aLengthMenu": [
            [5, 10, 15, -1],
            [5, 10, 15, "All"]
        ],
        "iDisplayLength": 10,
        "language": {
            search: ""
        }
    });
    $('#reject_payment_list_filter [type=search]').attr('placeholder', 'Search');
}

function initAdminPaymetListDataTable() {
    $('#admin-payment-detail').DataTable({
        "aLengthMenu": [
            [5, 10, 15, -1],
            [5, 10, 15, "All"]
        ],
        "iDisplayLength": 10,
        "language": {
            search: ""
        }
    });
    $('#admin-payment-detail_filter [type=search]').attr('placeholder', 'Search');
}