const { default: axios } = require("axios");
const { defaultsDeep } = require("lodash");

void new class BipIndex{

    constructor()
    {
        this.bipForm = document.querySelector('#kt_form')
        this.currentCode = document.querySelector('#store_code')
        this.formValidation()
        this.datePickers()
        this.eventHandler()
    }

    eventHandler = () => {
        $('.bip_sl2').select2().on('change', this.getBusinessUnit)
        $('.bip_sl2').trigger('change')
        $('#after_price_field').hide()
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

        document.querySelector('#print_preview').addEventListener('click', (e) => {
            this.previewPrint()
        })

        // document.querySelector('#business_unit').addEventListener('change', (e) => {
        //     this.currentBusinessID = e.target.value
        //     this.getBusinessUnit()
        // })

        document.querySelector('#type').addEventListener('change', (e) => {
            if(e.target.value  == 2 || e.target.value  == 4 || e.target.value  == 7)
            {$('#after_price_field').show()}else{$('#after_price_field').hide()}
        })



    }

    getBusinessUnit = async(e) => {
        let val = (e.target == 1 ? e.target.value : 1)
        $('#store').empty()
        $('#store_code').empty()
        const {data:result} = await axios.get(`/api/get/store/${val}`)
        for(const e of result){$('#store').append(`<option value="${e.id}">${e.store}</option>`)}
        for(const elem of result){
            elem.store_code.forEach(element => {
                $('#store_code').append(`<option value="${element.store_code}">${element.store_code}</option>`)
            })
        }

    }

    previewPrint = () => {

        JsBarcode("#barcode", `${this.skuData}`, {
            format: "CODE39",
            height: 50,
            displayValue: false
        })
        const formData = this.getFormData()
        $('#barcode_receivedDate').html(humanDate(formData.get('receivedDate')))
        for (const elem of this.data)
        {
            $('#bracode_price').html(numberWithCommas(parseFloat(elem.price).toFixed(2)))
            $('#barcode_vendor').html(elem.vendor)
            $('#barcode_vendor_no').html(elem.ven_no)
        }
    }

    getFormData = () =>{
        this.formData = new FormData(this.bipForm)
        return this.formData
    }

    getItemBySku = async(barcode) => {
        const {data:result} = await axios.get(`/api/get/item/${barcode}`,{params:{code:this.currentCode.value}})
        this.data = result
        for(const data of result)
        {
            $('#short_descr').val(data.short_descr)
            $('#short_description').html(data.short_descr)
            $('#buy_unit').val(data.buy_unit)
            $('#ven_no').val(data.ven_no)
            $('#price').val(numberWithCommas(parseFloat(data.price).toFixed(2)))
            $('#after_price').val(numberWithCommas(parseFloat(data.price).toFixed(2)))
        }

    }

    datePickers = () => {
        $('#receivedDate').datepicker(datePickerDefaultSetting).on('changeDate',  e => this.bipValidation.revalidateField('receivedDate'))
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

