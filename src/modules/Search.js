import axios from 'axios'
import {getElement} from './tool'

// Live Search
class Search {
  // 1. describe and create/initiate our object
  constructor() {
    this.addSearchHTML();
    this.searchBtn = getElement("#search-button");
    this.searchOverlay = getElement(".search-overlay");
    this.closeBtn = this.searchOverlay.querySelector(".search-overlay__close");
    this.searchField = this.searchOverlay.querySelector("#search-term");
    this.searchForm = this.searchOverlay.querySelector('#search-form');
    this.resultsDiv = this.searchOverlay.querySelector(
      "#search-overlay__results"
    );
    this.events();
    this.isOverlayOpen = false;
    this.isSpinnerVisible = false;
    this.previousValue;
    this.typingTimer;
    this.results;
    this.resultBtns;
    this.activeResultBtn;
    this.btnText = {'products': lasaphireData.productsName, 'ingredients': lasaphireData.ingredientsName, 'posts': lasaphireData.postsName, 'pages': lasaphireData.pagesName, 'faqs': lasaphireData.faqsName};
  }

  // 2. events
  events() {
    this.searchBtn.addEventListener("click", this.openOverlay.bind(this));
    this.closeBtn.addEventListener("click", this.closeOverlay.bind(this));
    document.addEventListener("keydown", this.keyPressDispatcher.bind(this));
    this.searchField.addEventListener("keyup", this.typingLogic.bind(this));
  }

  resultSelect() {
    setTimeout(() => {
      this.resultButtons = this.searchOverlay.querySelectorAll(".btn-normal-search");
      this.resultRows = this.searchOverlay.querySelectorAll('.result-row')
      // console.log('buttons: ', this.resultButtons, 'rows: ', this.resultRows )
      this.resultEvents();
    }, 301);
  }

  resultEvents() {
    this.resultButtons.forEach((item) => {
      item.addEventListener("click", this.changeActiveResultBtn.bind(this));
    });
  }

  changeActiveResultBtn(e){
    // console.log(this.activeResultBtn);
    if(this.activeResultBtn !== e.target.id){
      // console.log('change')
      this.resultButtons.forEach(item => {
        if(item.id === this.activeResultBtn){
          item.classList.remove('active')
        } else if(item.id === e.target.id){
          item.classList.add('active')
        }
      })
      this.resultRows.forEach(item => {
        if(item.id === this.activeResultBtn){
          item.classList.remove("result-show")
        } else if(item.id === e.target.id) {
          item.classList.add("result-show")
        }
      })
      this.activeResultBtn = e.target.id;
    } else {
      // console.log('rest')
    }
  }

  // 3. methods (function, action...)
  typingLogic() {
    if (this.searchField.value !== this.previousValue) {
      clearTimeout(this.typingTimer);

      if (this.searchField.value) {
        if (!this.isSpinnerVisible) {
          this.resultsDiv.innerHTML = '<div class="spinner-loader"></div>';
          this.isSpinnerVisible = true;
        }
        this.typingTimer = setTimeout(this.getResults.bind(this), 750);
      } else {
        this.resultsDiv.innerHTML = "";
        this.isSpinnerVisible = false;
      }
    }
    this.previousValue = this.searchField.value;
  }

  async getResults() {
    try {
      const posts = await axios.get(
        lasaphireData.root_url +
          "/wp-json/lasaphire/v1/search?term=" +
          this.searchField.value
      );
      this.results = posts.data;
      // console.log(this.results);
      // console.log(this.btnText['products']);
      this.resultBtns = Object.keys(this.results);
      this.resultBtns.map((item) => this.results[item]);
      this.resultBtns = this.resultBtns.filter(
        (item) => this.results[item].length > 0
      );
      // console.log(this.resultBtns);
      this.activeResultBtn = this.resultBtns[0];
      // console.log(this.activeResultBtn);
      // console.log(this.resultBtns.map((item) => this.results[item]));
      if (this.resultBtns.length > 0){
        this.resultsDiv.innerHTML = `
          <div class="row result-btn-wrapper">
            ${this.resultBtns.map(
              (item) =>
                `<button id="${item}" class="btn-alt btn-normal btn-normal-search ${
                  item === this.activeResultBtn ? "active" : ""
                }">${this.btnText[item]}<span class="search-badge">${
                  this.results[item].length
                }</span></button>`
            )}
          </div>`
          this.addResultLists()
          this.resultSelect()
      } else {
        this.resultsDiv.innerHTML = `
          <div class="row result-btn-wrapper">
            <h2>${lasaphireData.noResults}</h2>
          </div>
        `;
      }
      this.isSpinnerVisible = false;
    } catch (e) {
      console.log(e);
    }
  }

  keyPressDispatcher(e) {
    if (
      e.keyCode === 83 &&
      !this.isOverlayOpen &&
      document.activeElement.tagName !== "INPUT" &&
      document.activeElement.tagName !== "TEXTAREA"
    ) {
      this.openOverlay();
    }
    if (e.keyCode === 27 && this.isOverlayOpen) {
      this.closeOverlay();
    }
  }

  openOverlay() {
    this.searchOverlay.classList.add("search-overlay--active");
    getElement("body").classList.add("body-no-scroll");
    this.searchForm.classList.add('active');
    this.searchField.value = "";
    setTimeout(() => this.searchField.focus(), 1000);
    // console.log("our open method just ran!");
    this.isOverlayOpen = true;
  }

  closeOverlay() {
    this.searchOverlay.classList.remove("search-overlay--active");
    getElement("body").classList.remove("body-no-scroll");
    this.searchForm.classList.remove("active");
    // console.log(this.results);
    // console.log("our close method just ran!");
    this.isOverlayOpen = false;
  }

  addSearchHTML() {
    document.body.insertAdjacentHTML(
      "beforeend",
      `
        <div class="search-overlay">
	        <div class="search-overlay__top">
            <div class="container relative">
              <form id="search-form">
                <div id="search-cover">
                <input type="text" class="search-term" placeholder="${lasaphireData.inputPlaceholder}" id="search-term" autocomplete="off">
                <i class="fas fa-search search-overlay__icon" aria-hidden="true"></i>
                </div>
              </form>
              <i class="fas fa-window-close search-overlay__close" aria-hidden="true"></i>
            </div>
	        </div>

          <div class="container">
            <div id="search-overlay__results"></div>
          </div>

        </div>
      `
    );
  }

  addPostsInfo(){
    this.resultsDiv.insertAdjacentHTML(
      "beforeend",
      `
      <div id="posts" class="result-row ${
        this.activeResultBtn === "posts" ? "result-show" : ""
      }">
        <h2 class="search-overlay__section-title">${this.btnText['posts']}</h2>
        ${
          this.results.posts.length
            ? '<ul class="post-cards">'
            : "<p>Egyetlen bejegyzés sem felel meg a keresésnek.</p>"
        }
        ${this.results.posts
          .map(
            (item) =>
              `<li class="post-card-item">
                <a href="${item.permalink}">
                  <div class="post-card-header">
                    <h4>${item.title}</h4>
                    <img class="img-fluid" src="${item.image}">
                  </div>
                </a>
                <div class="post-content">
                  <p class="meta">Published by <a href="${item.authorLink}">${item.authorName}</a> on ${item.date}</p>
                  <p class="excerpt">${item.description}</p>
                </div>
              </li>`
          )
          .join("")}
        ${this.results.posts.length ? "</ul>" : ""}
      </div>

      `
    );
  }

  addPagesInfo(){
    this.resultsDiv.insertAdjacentHTML(
      "beforeend",
      `
      <div id="pages" class="result-row ${
        this.activeResultBtn === "pages" ? "result-show" : ""
      }">
        <h2 class="search-overlay__section-title">${this.btnText['pages']}</h2>
        ${
          this.results.pages.length
            ? '<ul class="link-list min-list pages-list">'
            : "<p>Egyetlen oldal információ sem felel meg a keresésnek.</p>"
        }
        ${this.results.pages
          .map(
            (item) =>
              `<li>
                <a href="${item.permalink}">
                  <h4 class="page-title">${item.title}</h4>
                  <p class="page-content">${item.content}</p>
                </a>
              </li>`
          )
          .join("")}
        ${this.results.pages.length ? "</ul>" : ""}
      </div>

      `
    );
  }

  addProductsInfo(){
    this.resultsDiv.insertAdjacentHTML(
      "beforeend",
      `
      <div id="products" class="result-row ${
        this.activeResultBtn === "products" ? "result-show" : ""
      }">
        <h2 class="search-overlay__section-title">${this.btnText['products']}</h2>
        ${
          this.results.products.length
            ? '<ul class="product-cards">'
            : `<p>Egyetlen termék sem felel meg a keresésnek. <a href="${lasaphireData.root_url}/shop">Tekintse meg összes termékünket.</a></p>`
        }
        ${this.results.products
          .map(
            (item) =>
              `<li class="product-card-item">
                <a href="${item.permalink}">
                  <div class="image-wrapper">
                    <img class="image-fluid" src="${item.image}">
                  </div>
                  <div class="product-card-content">
                    <h4>${item.title}</h4>
                    <p class="excerpt">${item.description}</p>
                  </div>
                  <div class="price">
                    ${
                      lasaphireData.currencyPos === "left"
                        ? `<p>${lasaphireData.currencySymbol}${item.regularPrice}</p>`
                        : `<p>${item.regularPrice}${lasaphireData.currencySymbol}</p>`
                    }
                  </div>
                </a>
              </li>`
          )
          .join("")}
        ${this.results.products.length ? "</ul>" : ""}
      </div>
      `
    );
  }

  addIngredientsInfo(){
    this.resultsDiv.insertAdjacentHTML(
      "beforeend",
      `
      <div id="ingredients" class="result-row ${
        this.activeResultBtn === "ingredients" ? "result-show" : ""
      }">
        <h2 class="search-overlay__section-title">${this.btnText['ingredients']}</h2>
        ${
          this.results.ingredients.length
            ? '<ul class="link-list min-list">'
            : `<p>Egyetlen összetevő sem felel meg a keresésnek.</p>`
        }
        ${this.results.ingredients
          .map(
            (item) =>
              `<li class="ingredient-result">
                <a href="${item.permalink}" class="row">
                  <div class="ingredient-info col-md-10">
                    <h4>${item.title}</h4>
                    <p>${item.description}</p>
                  </div>
                  <div class="ingredient-img col-md-2">
                    ${
                      item.image
                        ? `
                      <img class"img-fluid src="${item.image}" />
                      `
                        : ""
                    }
                  </div>
                </a>
              </li>`
          )
          .join("")}
        ${this.results.ingredients.length ? "</ul>" : ""}
      </div>
      `
    );
  }

  addFaqsInfo(){
    this.resultsDiv.insertAdjacentHTML(
      "beforeend",
      `
      <div id="faqs" class="result-row ${
        this.activeResultBtn === "faqs" ? "result-show" : ""
      }">
        <h2 class="search-overlay__section-title">${this.btnText['faqs']}</h2>
        ${
          this.results.faqs.length
            ? '<ul class="link-list min-list">'
            : `<p>Egyetlen gyakori kérdés sem felel meg a keresésnek.</p>`
        }
        ${this.results.faqs
          .map(
            (item) =>
              `<li><a href="${item.permalink}">${item.title}</a>
              </li>`
          )
          .join("")}
        ${this.results.faqs.length ? "</ul>" : ""}
      </div>
      `
    );
  }

  addResultLists(){
    this.addPostsInfo()
    this.addPagesInfo()
    this.addProductsInfo()
    this.addIngredientsInfo()
    this.addFaqsInfo()
  }
}

export default Search;
