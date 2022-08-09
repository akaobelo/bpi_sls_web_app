import './bootstrap';

window.KTAppSettings = {
    "breakpoints": {
      "sm": 576,
      "md": 768,
      "lg": 992,
      "xl": 1200,
      "xxl": 1200
    },
    "colors": {
      "theme": {
        "base": {
          "white": "#ffffff",
          "primary": "#0BB783",
          "secondary": "#E5EAEE",
          "success": "#1BC5BD",
          "info": "#8950FC",
          "warning": "#FFA800",
          "danger": "#F64E60",
          "light": "#F3F6F9",
          "dark": "#212121"
        },
        "light": {
          "white": "#ffffff",
          "primary": "#D7F9EF",
          "secondary": "#ECF0F3",
          "success": "#C9F7F5",
          "info": "#EEE5FF",
          "warning": "#FFF4DE",
          "danger": "#FFE2E5",
          "light": "#F3F6F9",
          "dark": "#D6D6E0"
        },
        "inverse": {
          "white": "#ffffff",
          "primary": "#ffffff",
          "secondary": "#212121",
          "success": "#ffffff",
          "info": "#ffffff",
          "warning": "#ffffff",
          "danger": "#ffffff",
          "light": "#464E5F",
          "dark": "#ffffff"
        }
      },
      "gray": {
        "gray-100": "#F3F6F9",
        "gray-200": "#ECF0F3",
        "gray-300": "#E5EAEE",
        "gray-400": "#D6D6E0",
        "gray-500": "#B5B5C3",
        "gray-600": "#80808F",
        "gray-700": "#464E5F",
        "gray-800": "#1B283F",
        "gray-900": "#212121"
      }
    },
    "font-family": "Poppins",
    'valid' : 'Valid',
    'invalid':'Invalid'
};

window.HOST_URL  = '#tenant'

window.showAlert  = (title,message,icon) => Swal.fire(title,message,icon)

window.confirmAlert = (title,message,callback) => {
    Swal.fire({
        icon:'question',
        title:title,
        text:message,
        showCancelButton:true,
        showLoaderOnConfirm:true,
        preConfirm:async()=>{
           await callback()
        },
        allowOutsideClick: () => !Swal.isLoading()
    })
}


window.setBounds = (x,y,height,size= 15)  => {
    return {
            x:x,
            y:height / 2 + y,
            size:size
    }
}


window.expandString = (string,isDoubleSpace = null) =>  (isDoubleSpace ?string.split('').join('   '): string.split('').join(' '))



window.wordToArray = (string) => {
    let details = string , counter = 0 , wraps = []
    do{
      let localCounter = counter
      counter+= 33
      wraps.push(details.substring(localCounter,counter))
    }while(counter < details.length)

    return wraps
}

window.firstQuarterBounds = (y,height) => {
    return { x:235,y:height / 2 + y, size:10}
}

window.secondQuarterBounds = (y,height) => {
    return {x:305,y:height/ 2 + y ,size:10}
}

window.thirdQuarterBounds = (y,height) => {
    return {x:375, y:height / 2 + y , size:10}
}

window.totalBounds = (y,height) => {
    return {x:445,y:height / 2 + y , size:10}
}

window.withHeldBounds = (y,height) => {
    return {x:515,y:height / 2 + y , size: 10}
}


window.datePickerDefaultSetting = {
    todayHighlight: true,
    templates: {
        leftArrow: '<i class=\"la la-angle-left\"></i>',
        rightArrow: '<i class=\"la la-angle-right\"></i>'
    },
    format:'yyyy-mm-dd'
}


window.humanDate = (date) => new Date(date).toLocaleString('en-us',{month:'long', day:'numeric',year:'numeric'})

window.humanDateWithoutDay = (date) => new Date(date).toLocaleString('en-us',{month:'long',year:'numeric'})


window.getExt = (filepath) => filepath.split("?")[0].split("#")[0].split('.').pop()


window.generateFileIcon = (fileName) => {

    if(['docx','doc','txt'].includes(getExt(fileName)))
    {
        return '/assets/svg/doc.svg'
    }else if(['png','gif','jpeg','jpg'].includes(getExt(fileName)))
    {
        return '/assets/svg/jpg.svg'
    }else if('pdf' === getExt(fileName))
    {
        return '/assets/svg/pdf.svg'
    }
}


