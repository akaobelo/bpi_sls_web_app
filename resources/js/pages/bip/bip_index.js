const { default: axios } = require("axios");

void new class UpdateInformation{

    constructor()
    {
        this.formValidation()
        this.datePickers()
    }

    datePickers = () => {
        $('#receivedDate').datepicker(datePickerDefaultSetting).on('changeDate',  e => this.addSoaValidator.revalidateField('received_date'))
    }

    contractModalFormValidation = () => {

        this.bipValidation = FormValidation.formValidation(
            this.SoaForm,
            {
                fields:{
                    statement_of_account:{
                        validators:{
                            notEmpty:{
                                message:"Statement of account number is required"
                            }
                        }
                    },
                    statement_date:{
                        validators:{
                            notEmpty:{
                                message:"Statement date is required"
                            }
                        }
                    },
                    rental_period:{
                        validators:{
                            notEmpty:{
                                message:"Rental period start is required"
                            }
                        }
                    },
                    payment_due_date:{
                        validators:{
                            notEmpty:{
                                message:"Payment due date is required"
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

