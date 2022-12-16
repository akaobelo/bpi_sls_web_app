const { default: axios } = require("axios")
const e = require("cors")

void new class BipIndex{

    constructor()
    {
        this.initialization()
        this.formValidation()
        this.eventHandler()
        this.populateStore()
        $('.bip_sl2').trigger('change')
        this.currentType = 1
        this.compName = compName
        this.printerName = printerName
        this.postBarTenderUrl = `http://${this.printerName}:8080/Integration/WebServiceIntegrationPOST/Execute`
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
            this.resetForm()
        })

        document.querySelector('#print_data').addEventListener('click', async() => {
            this.postPrintData()
        })
        document.querySelector('#print_preview').addEventListener('click', async(e) => {

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


        })

        $(document).on('click','.print_trigger', () => {
            this.resetForm()
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


    postPrintData = () => {
        this.store_code = $('#store_code').val()
        switch(this.getFormData().get('type')){
            case '1':
                fetch(this.postBarTenderUrl,{
                    mode: 'no-cors',
                    method: 'POST',
                    headers:{
                        'Accept': 'application/json',
                        'Content-type': 'application/json'
                    },
                    body: JSON.stringify({
                        "PrinterName": this.printerName,
                        "Quantity": this.getFormData().get('quantity'),
                        "barcode_vendor": this.getFormData().get('vendor'),
                        "price":  this.getFormData().get('price'),
                        "received_date": this.getFormData().get('receivedDate'),
                        "short_descr": this.getFormData().get('short_descr'),
                        "upc": this.getFormData().get('sku'),
                        "ven_no": this.getFormData().get('ven_no'),
                        "TagLabel": 'hard_tag.btw'
                    })
                })
                break;

            case '2':
                this.hard_tag_label = (this.store_code[0] == 1 ? 'hard_tag_markdownG.btw' : 'hard_tag_markdownM.btw')
                fetch(this.postBarTenderUrl,{
                    mode: 'no-cors',
                    method: 'POST',
                    headers:{
                        'Accept': 'application/json',
                        'Content-type': 'application/json'
                    },
                    body: JSON.stringify({
                        "PrinterName": this.printerName,
                        "Quantity": this.getFormData().get('quantity'),
                        "barcode_vendor": this.getFormData().get('vendor'),
                        "price":  this.getFormData().get('after_price'),
                        "received_date": this.getFormData().get('receivedDate'),
                        "short_descr": this.getFormData().get('short_descr'),
                        "upc": this.getFormData().get('sku'),
                        "ven_no": this.getFormData().get('price'),
                        "TagLabel": this.hard_tag_label
                    })
                })
                break;
            case '3':
                fetch(this.postBarTenderUrl,{
                    mode: 'no-cors',
                    method: 'POST',
                    headers:{
                        'Accept': 'application/json',
                        'Content-type': 'application/json'
                    },
                    body: JSON.stringify({
                        "PrinterName": this.printerName,
                        "Quantity": this.getFormData().get('quantity'),
                        "barcode_vendor": this.getFormData().get('vendor'),
                        "price":  this.getFormData().get('after_price'),
                        "received_date": this.getFormData().get('receivedDate'),
                        "short_descr": this.getFormData().get('short_descr'),
                        "upc": this.getFormData().get('sku'),
                        "ven_no": this.getFormData().get('price'),
                        "TagLabel": 'sticker_ballpen.btw'
                    })
                })
                break;

            case '4':
                this.sticker_tag_label = (this.store_code[0] == '1' ? 'sticker_tag_markdownG.btw' : 'sticker_tag_markdownM.btw')
                fetch(this.postBarTenderUrl,{
                    mode: 'no-cors',
                    method: 'POST',
                    headers:{
                        'Accept': 'application/json',
                        'Content-type': 'application/json'
                    },
                    body: JSON.stringify({
                        "PrinterName": this.printerName,
                        "Quantity": this.getFormData().get('quantity'),
                        "barcode_vendor": this.getFormData().get('vendor'),
                        "price":  this.getFormData().get('after_price'),
                        "received_date": this.getFormData().get('receivedDate'),
                        "short_descr": this.getFormData().get('short_descr'),
                        "upc": this.getFormData().get('sku'),
                        "ven_no": this.getFormData().get('price'),
                        "TagLabel": this.sticker_tag_label
                    })
                })
                break;

            case '5':
                fetch(this.postBarTenderUrl,{
                    mode: 'no-cors',
                    method: 'POST',
                    headers:{
                        'Accept': 'application/json',
                        'Content-type': 'application/json'
                    },
                    body: JSON.stringify({
                        "PrinterName": this.printerName,
                        "Quantity": this.getFormData().get('quantity'),
                        "barcode_vendor": this.getFormData().get('vendor'),
                        "price":  this.getFormData().get('price'),
                        "received_date": this.getFormData().get('receivedDate'),
                        "short_descr": this.getFormData().get('short_descr'),
                        "upc": this.getFormData().get('sku'),
                        "ven_no": this.getFormData().get('ven_no'),
                        "TagLabel": 'shelf_hard_tag.btw'
                    })
                })
                break;
        }
    }

    resetForm = () => {
        this.bipForm.reset()
        $('#short_description').html('')
        $('#barcode_receivedDate').html('')
        $('#bracode_price').html('')
        $('#barcode_vendor').html('')
        $('#barcode_vendor_no').html('')
        $('#barcode').html('')
    }

    populateStore = async() => {
        const {data:result} =  await axios.get('/api/fetch/tpsStore')

        for(const elem of result){
            $('#store').append(`<option value="${elem.name}">${elem.name}</option>`)
            $('#store_code').append(`<option>${elem.store}</option>`)
        }
    }

    storeCode = async e => {
        $('#store_code').empty()
        const {data:result} = await axios.get(`/api/get/storecode/${e.currentTarget.value}`)
        for(const e of result) $('#store_code').append(`<option >${e.store}</option>`)
    }


    previewPrint = () => {
        const formData = this.getFormData()
        JsBarcode("#barcode", `${parseInt(this.skuData,10)}`, {
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

    getItemBySku = async barcode => {

            const {data:result} = await axios.get(`/api/get/item/${barcode}`,{params:{code:this.currentCode.value}})
            for(const data of result)
            {
                this.vendor = data.vendor
                this.dataUPC = data.upc
                console.log(data)
                $('#short_descr').val(data.short_descr)
                $('#buy_unit').val(data.buy_unit)
                $('#ven_no').val(data.ven_no)
                $('#price').val(numberWithCommas(parseFloat(data.price).toFixed(2)))
                $('#after_price').val(numberWithCommas(parseFloat(data.price).toFixed(2)))
            }
            if(result == "Item Not Found!") showAlert('Warning!',result,'warning')

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

