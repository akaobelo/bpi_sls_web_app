
void new class SlsIndex{
    constructor(){
        this.initialization()
        this.populateStore()
        this.eventHandler()
    }

    initialization = () => {

        this.countClick = 0
        this.input = document.querySelector('#kt_tagify_1')
        this.slsForm = document.querySelector('#kt_form')
        this.removeButton =  document.querySelector('#kt_tagify_1_remove')
        this.currentCode = document.querySelector('#store_code')
        this.previewPrintBtn = document.querySelector('#btn_sls_print_preview')
        this.bussUnit = document.querySelector('#business_unit')
        this.editBtn = document.querySelector('#edit-btn')
        this.inputProdSpec = document.querySelector('#kt_tagify_1')

        this.regex = /[,\s]/g

        $('#short_descr').prop('readonly',true)
        $('#price').prop('readonly',true)
        $('.sl2').trigger('change')
        $('.sl2').select2()
        this.tagify =  new Tagify(this.input, {
            whitelist: ["A# .NET", "A# (Axiom)", "A-0 System", "A+", "A++", "ABAP", "ABC", "ABC ALGOL", "ABSET", "ABSYS", "ACC", "Accent", "Ace DASL", "ACL2", "Avicsoft", "ACT-III", "Action!", "ActionScript", "Ada", "Adenine", "Agda", "Agilent VEE", "Agora", "AIMMS", "Alef", "ALF", "ALGOL 58", "ALGOL 60", "ALGOL 68", "ALGOL W", "Alice", "Alma-0", "AmbientTalk", "Amiga E", "AMOS", "AMPL", "Apex (Salesforce.com)", "APL", "AppleScript", "Arc", "ARexx", "Argus", "AspectJ", "Assembly language", "ATS", "Ateji PX", "AutoHotkey", "Autocoder", "AutoIt", "AutoLISP / Visual LISP", "Averest", "AWK", "Axum", "Active Server Pages", "ASP.NET", "B", "Babbage", "Bash", "BASIC", "bc", "BCPL", "BeanShell", "Batch (Windows/Dos)", "Bertrand", "BETA", "Bigwig", "Bistro", "BitC", "BLISS", "Blockly", "BlooP", "Blue", "Boo", "Boomerang", "Bourne shell (including bash and ksh)", "BREW", "BPEL", "B", "C--", "C++ – ISO/IEC 14882", "C# – ISO/IEC 23270", "C/AL", "Caché ObjectScript", "C Shell", "Caml", "Cayenne", "CDuce", "Cecil", "Cesil", "Céu", "Ceylon", "CFEngine", "CFML", "Cg", "Ch", "Chapel", "Charity", "Charm", "Chef", "CHILL", "CHIP-8", "chomski", "ChucK", "CICS", "Cilk", "Citrine (programming language)", "CL (IBM)", "Claire", "Clarion", "Clean", "Clipper", "CLIPS", "CLIST", "Clojure", "CLU", "CMS-2", "COBOL – ISO/IEC 1989", "CobolScript – COBOL Scripting language", "Cobra", "CODE", "CoffeeScript", "ColdFusion", "COMAL", "Combined Programming Language (CPL)", "COMIT", "Common Intermediate Language (CIL)", "Common Lisp (also known as CL)", "COMPASS", "Component Pascal", "Constraint Handling Rules (CHR)", "COMTRAN", "Converge", "Cool", "Coq", "Coral 66", "Corn", "CorVision", "COWSEL", "CPL", "CPL", "Cryptol", "csh", "Csound", "CSP", "CUDA", "Curl", "Curry", "Cybil", "Cyclone", "Cython", "Java", "Javascript", "M2001", "M4", "M#", "Machine code", "MAD (Michigan Algorithm Decoder)", "MAD/I", "Magik", "Magma", "make", "Maple", "MAPPER now part of BIS", "MARK-IV now VISION:BUILDER", "Mary", "MASM Microsoft Assembly x86", "MATH-MATIC", "Mathematica", "MATLAB", "Maxima (see also Macsyma)", "Max (Max Msp – Graphical Programming Environment)", "Maya (MEL)", "MDL", "Mercury", "Mesa", "Metafont", "Microcode", "MicroScript", "MIIS", "Milk (programming language)", "MIMIC", "Mirah", "Miranda", "MIVA Script", "ML", "Model 204", "Modelica", "Modula", "Modula-2", "Modula-3", "Mohol", "MOO", "Mortran", "Mouse", "MPD", "Mathcad", "MSIL – deprecated name for CIL", "MSL", "MUMPS", "Mystic Programming L"],
            blacklist: ["Shit", "Pussy", "Fuck"], // <-- passed as an attribute in this demo
            maxTags: 5,
        })

    }

    eventHandler  ()  {
        $('#store').on('change', this.storeCode)
        $(document).on('click','.checkbox', this.checkStatusCheck)
        this.removeButton.addEventListener('click', this.tagify.removeAllTags.bind(this.tagify));
        $(document).on('change','#printing_type', this.UIpropertyChange)

        document.querySelector('#sku').addEventListener('input',(e) => {
            let skuData = (e.target.value == null ? '' : e.target.value)
            this.skuData = skuData
            this.getItemBySku(skuData)
        })

        document.querySelector('#btn_clear').addEventListener('click', (e) => {
            this.slsForm.reset()
        })

        this.previewPrintBtn.addEventListener('click', () => {
            this.populateDataPrintPreview()
        })

        this.editBtn.addEventListener('click', () => {
            $('#short_descr').removeAttr('readonly')
            $('#price').removeAttr('readonly')
        })

        document.querySelector('#btn_sls_print_preview').addEventListener('click', () => {
            let data = $('#kt_form').serialize() +  '&barcode_vendor=' + $('#barcode_vendor').text() + '&upc=' + this.dataUPC + '&signage_option=' + this.signageOption
            this.countClick+=1
            if(this.countClick == 1)
            {
                $('#btn_print_container').empty()
                const container = document.querySelector('#btn_print_container')
                const anchor = document.createElement('a')
                const button = document.createElement('button')
                anchor.href = `/print/sls/tag?${data}`
                button.innerText = 'Print'
                button.classList.add("form-control","btn-primary","btn","btn-primary","font-weight-bold")
                button.setAttribute('target','_blank')
                anchor.setAttribute('type','button')
                anchor.appendChild(button)
                container.appendChild(anchor)
                this.countClick = 0
                this.slsForm.reset()
            }
        })
    }

    checkStatusCheck = () => {
        $('#sale_price').removeAttr('readonly')
        this.signageOption = $('.checkbox').is(':checked')
        if($('.checkbox').is(':checked') == true)
        {
            $('#sale_price').removeAttr('readonly')
        }
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

    populateDataPrintPreview = () => {
        const data = this.getFormData()
        let size = 0
        this.sale_price = (data.get('sale_price') ? data.get('sale_price') :'0.00')
        console.log(this.sale_price)
        if(data.get('printing_type') == 2) size = 50
        JsBarcode("#barcode", `${parseInt(this.skuData,10)}`, {
            format: "CODE39",
            height: 60,
            fontSize: 40,
            textAlign: "center",
            marginRight: size
        })
        if(data.get('product_specification')){
            const prod_spec = JSON.parse(data.get('product_specification'))
            $('#product_specification').empty()

            for(const specs of prod_spec){
                $('#product_specification').append(`
                    <span  class="text-muted text-hover-primary text-wrap">
                        ${specs.value},
                    </span>
                `)
            }
        }
        $('#modal-description').html(`${data.get('short_descr')}`)
        $('.color').html(`${data.get('color')}`)
        $('.material').html(`${data.get('material')}`)
        $('.size').html(`${data.get('size')}`)
        $('.price').val(`₱ ${numberWithCommas(parseFloat(data.get('price').replace(this.regex,'')).toFixed(2))}`)
        $('.sale_price').val(`₱ ${numberWithCommas(parseFloat(this.sale_price).toFixed(2))}`)
        $('#barcode_description').html(`<h3>${data.get('sku')}</h3>`)

    }

    getFormData = () => {return new FormData(this.slsForm)}

    getItemBySku = async barcode => {

        try {
            const {data:result} = await axios.get(`/api/get/item/${barcode}`,{params:{code:this.currentCode.value}})

            for(const data of result)
            {
                this.dataUPC = data.upc
                $('#short_descr').val(data.short_descr)
                $('#price').val(numberWithCommas(parseFloat(data.price).toFixed(2)))
            }
        }catch({response:err})
        {
            showAlert('Warning!', 'Invalid Code', 'warning')
        }

    }

    UIpropertyChange (e) {

        $('#static_row').empty()
        if(e.target.value == 1)
        {
            $('#sale_price_container').attr('hidden', true)
            $('#modal_size').removeClass('modal-lg')
            $('#modal_size').addClass('modal-sm')
            $('#shelf_container_print').show()
            $('#shelf_container').show()
            $('#static_row').append(`
            <div class="col-lg-6">
                <label>Type</label>
                <div class="input-group">
                    <select autocomplete="off" class="form-control form-control-solid form-control-md" name="printing_type" id="printing_type">
                        <option value="1" selected>Shelf label</option>
                        <option value="2">Signage</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <label>Price</label>
                <input type="email" style="background-color:#EBEBE4;" class="form-control" name="price" id="price" readonly>
            </div>
            `)
        }else{
            $('.signage_option').removeAttr('hidden')
            $('#sale_price_container').removeAttr('hidden')
            $('#modal_size').addClass('modal-md')
            $('#modal_size').removeClass('modal-sm')
            $('#shelf_container_print').hide()
            $('#shelf_container').hide()
            $('#static_row').append(`
            <div class="col-lg-4">
                <label>Type</label>
                <div class="input-group">
                    <select autocomplete="off" class="form-control form-control-solid form-control-md" name="printing_type" id="printing_type">
                        <option value="1">Shelf label</option>
                        <option value="2" selected>Signage</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <label>Price</label>
                <input type="" class="form-control" style="background-color:#EBEBE4;" name="price" id="price" readonly>
            </div>
            <div class="col-lg-4">
                <label>Sale Price</label>
                <input type="" class="form-control" style="background-color:#EBEBE4;" name="sale_price" id="sale_price" readonly>
                <span class="form-text text-muted">Sale price should be lower than original price</span>
            </div>
            `)
        }

    }
}
