void new class MasterSettings{
    constructor()
    {
        this.btnConfirm = document.querySelector('#btnConfirm')
        this.eventHandler()
    }

    eventHandler () {
         this.btnConfirm.addEventListener('click', async() => {
            this.validateMasterKey()
         })
    }

    validateMasterKey = async() => {
     await axios.post(`/api/validate/master/${$('.master_key').val()}`)
    }
}
