<script src="{{ mix('js/app.js') }}"></script>

<script src="{{ asset('/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('/vendors/tinymce/tinymce.min.js') }}"></script>


<script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>

{{-- test --}}
<script src="http://code.jquery.com/jquery-3.4.1.js"></script>

<script src="{{ asset('/js/simple-datatables.js') }}"></script>


<!-- Include Choices JavaScript -->
<script src="{{ asset('/vendors/choices.js/choices.min.js') }}"></script>
<script src="{{ asset('/js/pages/form-element-select.js') }}"></script>

<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>

<script>
    document.querySelectorAll('input[type-currency="IDR"]').forEach((element) => {
        element.addEventListener('keyup', function(e) {
            let cursorPostion = this.selectionStart;
            let value = parseInt(this.value.replace(/[^,\d]/g, ''));
            let originalLenght = this.value.length;
            if (isNaN(value)) {
                this.value = "";
            } else {
                this.value = value.toLocaleString('id-ID', {
                    currency: 'IDR',
                    style: 'currency',
                    minimumFractionDigits: 0
                });
                cursorPostion = this.value.length - originalLenght + cursorPostion;
                this.setSelectionRange(cursorPostion, cursorPostion);
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    config = {
        dateFormat: "d-m-Y",
    }
    flatpickr("#date", config);
</script>

{{-- <script src="http://code.jquery.com/jquery-3.4.1.js"></script> --}}
<script>
    $(document).ready(function() {
        $('#category').on('click', function() {
            let id = $(this).val();
            $('#sub_category').empty();
            $('#sub_category').append(`<option value="0" disabled selected>Processing...</option>`);
            $.ajax({
                type: 'GET',
                url: 'GetSubCatAgainstMainCatEdit/' + id,
                success: function(response) {
                    var response = JSON.parse(response);
                    console.log(response);
                    $('#sub_category').empty();
                    $('#sub_category').append(
                        `<option value="0" disabled selected>-Pilih-</option>`);
                    response.forEach(element => {
                        $('#sub_category').append(
                            `<option value="${element['id']}">${element['malam']}</option>`
                            );
                        $('#sub_category').append(
                            `<option value="${element['id']}">${element['jam']}</option>`
                            );
                    });
                }
            });
        });
    });
</script>



@stack('scripts')



@livewireScripts
<script src="{{ asset('/js/main.js') }}"></script>



{{ $script ?? '' }}
