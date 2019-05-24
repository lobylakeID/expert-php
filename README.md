## Selamat datang di Expert PHP
Framework PHP yang satu ini mengajarkan anda untuk membuat kode singkat dan jelas dan juga mudah untuk dipahami
oleh orang-orang yang mempelajari program anda.

### Contoh kode 1(Setup routes):
```markdown
Route::get(['/', '/welcome', '/welcome/'], function(){
  return load::controller('welcome', 'main');
}, true);
```

### Contoh kode 2(Controller file):
```markdown
use System\Base\Controller;

class Hello extends Controller {

  public function main(){
  
    print("Hello World!");
  
  }

}
```

## Support
Website          : [lobylake](http://lobylakeid.000webhostapp.com)
Github repository: [repo](https://github.com/lobylakeid/expert-php/)
