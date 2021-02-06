

(function($) {
    ToastInformation = function(judul){
        $.toast({
            heading: judul,
            text: 'Loaders are enabled by default. Use `loader`, `loaderBg` to change the default behavior',
            icon: 'info',
            loader: true,        // Change it to false to disable loader
            loaderBg: '#9EC600'  // To change the background
        })
    }
    ToastSuccesLogin = function(data){
        $.toast({
            heading: 'Success',
            text: data,
            position: 'top-right',
            icon: 'success'
        })
    }
    ToastGagalLogin = function(data){
        $.toast({
            heading: 'Gagal Login',
            text: data,
            position: 'top-right',
            icon: 'error'
        })
    }
    ToastSucces = function(data){
        $.toast({
            heading: 'Success',
            text: data,
            position: 'top-right',
            icon: 'success'
        })
    }
    ToastGagal = function(data){
        $.toast({
            heading: 'Gagal',
            text: data,
            position: 'top-right',
            icon: 'error'
        })
    }
    ToastInfo= function(data){
        $.toast({
            heading: 'Peringatan',
            text: data,
            position: 'top-right',
            icon: 'info'
        })
    }
  })(jQuery);
  