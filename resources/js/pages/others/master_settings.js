const { default: axios } = require("axios");

void new class MasterSettings{
    constructor()
    {
        this.btnConfirm = document.querySelector('#btnConfirm')
        this.btnConfSave = document.querySelector('#btnConfSave')
        this.eventHandler()
        $('.modal-backdrop').remove();

    }

    eventHandler () {
         this.btnConfirm.addEventListener('click', async() => {
            this.validateMasterKey()
         })

         this.btnConfSave.addEventListener('click', () => {
            this.configuration()
         })
    }

    configuration = async() => {
        this.printer_setup = $('#printer_name').val()
        this.disable = $('#disable_module').val()
        let data = {
            "printer_name" : this.printer_setup,
            "disabling" : this.disable
        }
        try{
            const response = await axios.post('/api/update/configuration', data)
            $('#master_config').modal('hide')
            $('.modal-backdrop').remove();
            showAlert('Success',response.data.message,'success')
        }catch({response:errr}){
            showAlert('Error', 'Error encounter','error')
        }
    }

    updateConfiguration = async() => {
        try{
            const response = await axios.post('/api/update/configuration')
        }catch({response:err}){

        }
    }

    validateMasterKey = async() => {
        try{
            const response = await axios.post(`/api/validate/master/${$('.master_key').val()}`)
            if(response){
                $('#master_config').removeAttr('hidden')
                $('#master_config').modal('show')
                $('#master_settings').attr('hidden',true)
            }
        }catch({response:err})
        {
            showAlert('Error', 'Invalid Master Key','error')
        }

    }
}
