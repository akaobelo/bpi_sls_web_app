void new class MasterSettings{
    constructor()
    {
        this.btnConfirm = document.querySelector('#btnConfirm')
        this.btnConfSave = document.querySelector('#btnConfSave')
        this.eventHandler()
    }

    eventHandler () {
         this.btnConfirm.addEventListener('click', async() => {
            this.validateMasterKey()
         })

         this.btnConfSave.addEventListener('click', () => {
            this.configuration()
         })
    }

    configuration = () => {
        this.printer_setup = $('#printer_name').val()
        this.disable = $('#disable_module').val()
        if()
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
