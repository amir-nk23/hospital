

<script>

    function conertToToman(goalInput,GoalId){
        let txt=document.getElementById(goalInput)
        let txtValue= txt.value;
        const f = new Intl.NumberFormat('fa-IR', {
            style: 'currency',
            currency: 'IRR'
        });
        const number = parseFloat(txtValue);
        if (!isNaN(number)) {
            const formattedNumber = f.format(number);
            const formattedTomans = formattedNumber.replace(/ریال/g, 'تومان');
            // Display the formatted number in the "result" div
            let result = document.getElementById(GoalId);
            result.innerText =  formattedTomans;
        }
    }




    const f = new Intl.NumberFormat('es-us',{

    })

</script>


<script>

    $(".js-example-basic-multiple-limit").select2({
        maximumSelectionLength: 100
    });

</script>

<script>

    // Assuming you have a reference to the element
    var element = document.getElementById('buttom');

    // Get the position of the element relative to the viewport
    var elementRect = element.getBoundingClientRect();

    // Check if the element is below the viewport
    if (elementRect.bottom > window.innerHeight) {
        // Scroll the page to show the element
        window.scrollTo({
            top: window.scrollY + elementRect.bottom - window.innerHeight,
            behavior: 'smooth' // This will create a smooth scrolling effect
        });
    }

</script>



<script>

    $(document).ready(function() {
        $('.record-checkbox').change(function() {
            var totalAmount = 0;
            $('.record-checkbox:checked').each(function() {
                var amount = $(this).closest('tr').find('td:nth-child(6)').text().replace(/,/g,'');
                totalAmount += parseInt(amount);
            });
            $('#total-amount').val(totalAmount);
            $('#total-amount-f').text(totalAmount.toLocaleString());
        });
    });



</script>



<script>


    $('#due_date_show').MdPersianDateTimePicker({
        targetDateSelector: '#due_date',        targetTextSelector: '#due_date_show',
        englishNumber: false,        toDate:true,
        enableTimePicker: false,        dateFormat: 'yyyy-MM-dd',
        textFormat: 'yyyy-MM-dd',        groupId: 'rangeSelector1',
    });</script>


<script>

    function checkoption(){

        const payType = document.getElementById('pay_type');

        const due_date = document.getElementById('due_date');



        if(payType.value === 'cheque'){


            due_date.disabled = false;

        }else{

            due_date.disabled = true;

        }

    }


</script>



<script>
    function confirmDelete(formId) {
        swal({
            title: 'آیا مطمئن هستید؟',
            text: 'بعد از حذف این آیتم دیگر قابل بازیابی نخواهد بود!',
            icon: 'warning',
            buttons: ["انصراف", "حذف کن"],
            dangerMode: true
        })
            .then((willDelete) => {
                if (willDelete) {
                    document.getElementById(formId).submit();
                    swal('آیتم با موفقیت حذف شد.', {
                        icon: 'success',
                    });
                }
            });
    }

    $(function(e) {
        $('.summernote').summernote({
            placeholder: "متن را اینجا وارد کنید...",
            tabsize: 3,
            height: 300
        });
    });
</script>


<?php echo $__env->yieldContent('script'); ?>
<?php /**PATH E:\hospital\resources\views/layout/scrtipt.blade.php ENDPATH**/ ?>