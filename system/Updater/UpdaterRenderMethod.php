<?php

namespace System\Updater;

class UpdaterRenderMethod {

    protected static function _getUpdater(string $url, string $id, string $this_domain){

        print('<html>');
        print('<head>');
        print('<script src="" type="text/javascript"></script>');
        print('<script>');
        print("
        $(document).ready(function(){
            $.ajax({
                url: '$url',
                type: 'post',
                data: {'id': '$id'},
                success: function(array_file){
                    $.ajax({
                        url: '$this_domain/update',
                        type: 'post',
                        data: {'file_value', array_file},
                        success: function(){
                            alert('Please run \'runUpdater\' method...');
                        }
                    });
                }
            });
        });
        ");
        print('</script>');
        print('</head>');
        print('</html>');

    }

    protected static function _downloadLatestVersion(){

        header('location:http://lobylakeid.000webhostapp.com/expert-php/download-latest-version');

    }

}