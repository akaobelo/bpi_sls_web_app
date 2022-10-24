const { default: axios } = require("axios")

void new class BipIndex{

    constructor()
    {
        this.initialization()
        this.formValidation()
        this.eventHandler()
        this.populateStore()
        $('.bip_sl2').trigger('change')
        this.currentType = 1
    }

    initialization = () => {
        this.bipForm = document.querySelector('#kt_form')
        this.currentCode = document.querySelector('#store_code')
        this.editBtn = document.querySelector('#editBtn')
        $('#this_print').trigger('click')
        $('#short_descr').prop('readonly', true)
        $('#buy_unit').prop('readonly',true)
        $('#ven_no').prop('readonly', true)
        $('#price').prop('readonly',true)
        $('#after_price').prop('readonly',true)
        $('#after_price_field').hide()
    }
    eventHandler = () => {
        $('#store').on('change', this.storeCode)
        $('.sl2').select2()

        document.querySelector('#sku').addEventListener('input',(e) => {
            let skuData = (e.target.value == null ? '' : e.target.value)
            this.skuData = skuData
            this.getItemBySku(skuData)
        })

        document.querySelector('#btn_clear').addEventListener('click',(e) => {
            this.bipForm.reset()
            $('#short_description').html('')
            $('#barcode_receivedDate').html('')
            $('#bracode_price').html('')
            $('#barcode_vendor').html('')
            $('#barcode_vendor_no').html('')
            $('#barcode').html('')
        })

        document.querySelector('#print_preview').addEventListener('keypress', async(e) => {
            if(e.keyCode === 13)
            {

            let data = $('#kt_form').serialize() +  '&barcode_vendor=' + $('#barcode_vendor').text() + '&store_code='+this.currentCode.value + '&upc=' + this.dataUPC
            this.previewPrint()
            if(this.currentType == 2 || this.currentType == 4)
            {
                $('.default_view').attr('hidden',true)
                $('.markdown_view').removeAttr('hidden')
            }else{
                $('.default_view').removeAttr('hidden')
                $('.markdown_view').attr('hidden',true)
            }
            $('#btn_print_container').empty()
            const container = document.querySelector('#btn_print_container')
            const anchor = document.createElement('a')
            const button = document.createElement('button')
            anchor.href = `/print/tag?${data}`
            button.innerText = 'Print'
            button.classList.add("form-control","btn-primary","btn","btn-primary","font-weight-bold","print_trigger")
            button.setAttribute('type','button')
            anchor.setAttribute('target','_blank')
            anchor.appendChild(button)
            container.appendChild(anchor)
            // this.bipForm.reset()
            // $('#short_description').html('')
            // $('#barcode_receivedDate').html('')
            // $('#bracode_price').html('')
            // $('#barcode_vendor').html('')
            // $('#barcode_vendor_no').html('')
            // $('#barcode').html('')
            }

        })

        document.querySelector('#type').addEventListener('change', (e) => {
            this.currentType = e.target.value
            if(e.target.value  == 2 || e.target.value  == 4 )
            {$('#after_price_field').show()}else{$('#after_price_field').hide()}
        })

        this.editBtn.addEventListener('click', () => {

            $('#price').removeAttr('readonly')
            $('#after_price').removeAttr('readonly')
            $('#sku').focus()
            $('#ven_no').removeAttr('readonly')

            $('#ven_no').prop('style',false)
            $('#price').prop('style',false)
            $('#after_price').prop('style',false)
            $('#sku').focus()
        })
    }

    populateStore = async() => {
        const {data:result} =  await axios.get('/api/fetch/tpsStore')

        for(const elem of result){
            $('#store').append(`<option value="${elem.name}">${elem.name}</option>`)
            $('#store_code').append(`<option>${elem.store}</option>`)
        }
    }

    storeCode = async(e) => {
        $('#store_code').empty()
        const {data:result} = await axios.get(`/api/get/storecode/${e.currentTarget.value}`)
        for(const e of result) $('#store_code').append(`<option >${e.store}</option>`)
    }


    previewPrint = () => {
        const formData = this.getFormData()
        JsBarcode("#barcode", `${this.skuData}`, {
            format: "CODE39",
            height: 60,
            displayValue: true
        })
        $('#barcode_receivedDate').html(formData.get('receivedDate'))
        $('#short_description').html(formData.get('short_descr'))
        $('#bracode_price').html(numberWithCommas(formData.get('price')))
        $('#barcode_vendor').html(formData.get('vendor'))
        $('#barcode_vendor_no').html(formData.get('ven_no'))
        $('#markdown_now_price').html(numberWithCommas(formData.get('after_price')))
        $('#markdown_before_price').html(numberWithCommas(formData.get('price')))
    }

    getFormData = () =>
    {
        this.formData = new FormData(this.bipForm)
        this.formData.append('vendor', this.vendor)
        this.formData.append('short_description',$('#short_descr').val())
        this.formData.append('buy_unit',$('#buy_unit').val())
        this.formData.append('ven_no', $('#ven_no').val())
        this.formData.append('price', $('#price').val())
        this.formData.append('after_price', $('#after_price').val())
        this.formData.append('barcode_vendor_no', $('#barcode_vendor_no').text())
        return  this.formData
    }

    getItemBySku = async(barcode) => {

            const {data:result} = await axios.get(`/api/get/item/${barcode}`,{params:{code:this.currentCode.value}})
            console.log(result)
            for(const data of result)
            {
                this.vendor = data.vendor
                this.dataUPC = data.upc
                $('#short_descr').val(data.short_descr)
                $('#buy_unit').val(data.buy_unit)
                $('#ven_no').val(data.ven_no)
                $('#price').val(numberWithCommas(parseFloat(data.price).toFixed(2)))
                $('#after_price').val(numberWithCommas(parseFloat(data.price).toFixed(2)))
            }
            if(result == "Invalid Code") showAlert('Warning!',result,'warning')

    }

    formValidation = () => {

        this.bipValidation = FormValidation.formValidation(
            this.bipForm,
            {
                fields:{
                    sku:{
                        validators:{
                            notEmpty:{
                                message:"Statement of account number is required"
                            }
                        }
                    },
                    quantity:{
                        validators:{
                            notEmpty:{
                                message:"Statement date is required"
                            }
                        }
                    },
                    receivedDate:{
                        validators:{
                            notEmpty:{
                                message:"Rental period start is required"
                            }
                        }
                    }
                },
                plugins: {
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
            }
        )
    }


}

