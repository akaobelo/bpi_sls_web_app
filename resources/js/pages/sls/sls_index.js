
void new class SlsIndex{
    constructor(){
        this.input = document.querySelector('#kt_tagify_1')
        this.removeButton =  document.querySelector('#kt_tagify_1_remove')
        this.typeOption = document.querySelector('#type')
        this.currentCode = document.querySelector('#store_code')
        this.eventHandler()
    }

    eventHandler  ()  {
       this.tagify =  new Tagify(this.input, {
            whitelist: ["A# .NET", "A# (Axiom)", "A-0 System", "A+", "A++", "ABAP", "ABC", "ABC ALGOL", "ABSET", "ABSYS", "ACC", "Accent", "Ace DASL", "ACL2", "Avicsoft", "ACT-III", "Action!", "ActionScript", "Ada", "Adenine", "Agda", "Agilent VEE", "Agora", "AIMMS", "Alef", "ALF", "ALGOL 58", "ALGOL 60", "ALGOL 68", "ALGOL W", "Alice", "Alma-0", "AmbientTalk", "Amiga E", "AMOS", "AMPL", "Apex (Salesforce.com)", "APL", "AppleScript", "Arc", "ARexx", "Argus", "AspectJ", "Assembly language", "ATS", "Ateji PX", "AutoHotkey", "Autocoder", "AutoIt", "AutoLISP / Visual LISP", "Averest", "AWK", "Axum", "Active Server Pages", "ASP.NET", "B", "Babbage", "Bash", "BASIC", "bc", "BCPL", "BeanShell", "Batch (Windows/Dos)", "Bertrand", "BETA", "Bigwig", "Bistro", "BitC", "BLISS", "Blockly", "BlooP", "Blue", "Boo", "Boomerang", "Bourne shell (including bash and ksh)", "BREW", "BPEL", "B", "C--", "C++ – ISO/IEC 14882", "C# – ISO/IEC 23270", "C/AL", "Caché ObjectScript", "C Shell", "Caml", "Cayenne", "CDuce", "Cecil", "Cesil", "Céu", "Ceylon", "CFEngine", "CFML", "Cg", "Ch", "Chapel", "Charity", "Charm", "Chef", "CHILL", "CHIP-8", "chomski", "ChucK", "CICS", "Cilk", "Citrine (programming language)", "CL (IBM)", "Claire", "Clarion", "Clean", "Clipper", "CLIPS", "CLIST", "Clojure", "CLU", "CMS-2", "COBOL – ISO/IEC 1989", "CobolScript – COBOL Scripting language", "Cobra", "CODE", "CoffeeScript", "ColdFusion", "COMAL", "Combined Programming Language (CPL)", "COMIT", "Common Intermediate Language (CIL)", "Common Lisp (also known as CL)", "COMPASS", "Component Pascal", "Constraint Handling Rules (CHR)", "COMTRAN", "Converge", "Cool", "Coq", "Coral 66", "Corn", "CorVision", "COWSEL", "CPL", "CPL", "Cryptol", "csh", "Csound", "CSP", "CUDA", "Curl", "Curry", "Cybil", "Cyclone", "Cython", "Java", "Javascript", "M2001", "M4", "M#", "Machine code", "MAD (Michigan Algorithm Decoder)", "MAD/I", "Magik", "Magma", "make", "Maple", "MAPPER now part of BIS", "MARK-IV now VISION:BUILDER", "Mary", "MASM Microsoft Assembly x86", "MATH-MATIC", "Mathematica", "MATLAB", "Maxima (see also Macsyma)", "Max (Max Msp – Graphical Programming Environment)", "Maya (MEL)", "MDL", "Mercury", "Mesa", "Metafont", "Microcode", "MicroScript", "MIIS", "Milk (programming language)", "MIMIC", "Mirah", "Miranda", "MIVA Script", "ML", "Model 204", "Modelica", "Modula", "Modula-2", "Modula-3", "Mohol", "MOO", "Mortran", "Mouse", "MPD", "Mathcad", "MSIL – deprecated name for CIL", "MSL", "MUMPS", "Mystic Programming L"],
            blacklist: ["Shit", "Pussy", "Fuck"], // <-- passed as an attribute in this demo
        })
       this.removeButton.addEventListener('click', this.tagify.removeAllTags.bind(this.tagify));


        $(document).on('change','#type', this.UIpropertyChange)

        document.querySelector('#sku').addEventListener('input',(e) => {
            let skuData = (e.target.value == null ? '' : e.target.value)
            this.skuData = skuData
            this.getItemBySku(skuData)
        })

        document.querySelector('#business_unit').addEventListener('change', (e) => {
            this.currentBusinessID = e.target.value
            this.getBusinessUnit()
        })

    }

    getBusinessUnit = async() => {
        $('#store').empty()
        $('#store_code').empty()
        const {data:result} = await axios.get(`/api/get/store/${this.currentBusinessID}`)
        for(const e of result){$('#store').append(`<option value="${e.id}">${e.store}</option>`)}
        for(const elem of result){
            elem.store_code.forEach(element => {
                $('#store_code').append(`<option value="${element.store_code}">${element.store_code}</option>`)
            })
        }

    }

    getItemBySku = async(barcode) => {
            const {data:result} = await axios.get(`/api/get/item/${barcode}`,{params:{code:this.currentCode.value}})
            for(const data of result)
            {
                $('#short_descr').val(data.short_descr)
                $('#price').val(numberWithCommas(parseFloat(data.price).toFixed(2)))
            }
    }

    UIpropertyChange (e) {

        $('#static_row').empty()
        if(e.target.value == 1)
        {
            $('#shelf_container').show()
            $('#static_row').append(`
            <div class="col-lg-6">
                <label>Type</label>
                <div class="input-group">
                    <select autocomplete="off" class="form-control form-control-solid form-control-md" name="type" id="type">
                        <option value="1" selected>Shelf label</option>
                        <option value="2">Signage</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <label>Price</label>
                <input type="email" class="form-control" name="price" id="price" disabled>
            </div>
            `)
        }else{
            $('#shelf_container').hide()
            $('#static_row').append(`
            <div class="col-lg-4">
                <label>Type</label>
                <div class="input-group">
                    <select autocomplete="off" class="form-control form-control-solid form-control-md" name="type" id="type">
                        <option value="1">Shelf label</option>
                        <option value="2" selected>Signage</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <label>Price</label>
                <input type="email" class="form-control" name="price" id="price" disabled>
            </div>
            <div class="col-lg-4">
                <label>Sale Price</label>
                <input type="email" class="form-control" name="price" id="price" disabled>
            </div>
            `)
        }


    }
}
