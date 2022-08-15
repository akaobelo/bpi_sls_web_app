const { default: axios } = require("axios");

void new class UpdateInformation{

    constructor()
    {
        this.bipForm = document.querySelector('#kt_form')
        this.formValidation()
        this.datePickers()
        this.eventHandler()
    }

    eventHandler = () => {
        document.querySelector('#sku').addEventListener('input',(e) => {
            let skuData = (e.target.value == null ? '' : e.target.value)
            this.getItemBySku(skuData)
        })
    }

    getItemBySku = async(barcode) => {
        const {data:result} = await axios.get(`/api/get/item/${barcode}`)
        console.log(result)
        for(const data of result)
        {
            $('#short_descr').val(data.short_descr)
            $('#buy_unit').val(data.buy_unit)
            $('#ven_no').val(data.ven_no)
            $('#price').val(numberWithCommas(parseFloat(data.price).toFixed(2)))
            $('#after_price').val(numberWithCommas(parseFloat(data.price).toFixed(2)))
        }

    }





    datePickers = () => {
        $('#receivedDate').datepicker(datePickerDefaultSetting).on('changeDate',  e => this.addSoaValidator.revalidateField('receivedDate'))
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

