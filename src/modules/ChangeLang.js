import { getElement } from './tool';

class ChangeLang {
 constructor(){
  this.chl = getElement('.change-lang a')
  this.chl.href = this.chl.protocol + '//' + this.chl.hostname + window.location.pathname
 }
}

export default ChangeLang;