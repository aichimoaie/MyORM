
const app = new Vue({
  el: "#app",
  data: {
    showCategoryA: false,
    showCategoryB: false,
    showCategoryC: false
  },
  template: `
    <div class="categoryBrowser">
        <ul>
            <li>                
                <button class="accordion" 
                    :class="{ active : showCategoryA }" 
                    @click="showCategoryA = !showCategoryA">Category A
                </button>
                <ul class="category-list" v-show="showCategoryA" >
                    <li>Item #1</li>
                    <li>Item #2</li>
                    <li>Item #3</li>
                </ul>
            </li>
            <li>            
                <button class="accordion" 
                    :class="{ active : showCategoryB }" 
                    @click="showCategoryB = !showCategoryB">Category B
                </button>
                <ul class="category-list" v-show="showCategoryB">
                    <li>Item #100</li>
                    <li>Item #200</li>
                </ul>
            </li>
            <li>            
                <button class="accordion" 
                    :class="{ active : showCategoryC }" 
                    @click="showCategoryC = !showCategoryC">Category C
                </button>
                <ul class="category-list" v-show="showCategoryC">
                    <li>Item #9001</li>
                    <li>Item #9002</li>
                    <li>Item #9003</li>
                    <li>Item #9004</li>
                </ul>
            </li>
        </ul>
    </div>
    `
});
