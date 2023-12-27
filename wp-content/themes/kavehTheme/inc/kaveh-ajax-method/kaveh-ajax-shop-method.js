// Category Price
const categoryPrice = document.getElementById("category-price");
if (categoryPrice) {
  noUiSlider.create(categoryPrice, {
    start: [0, 100000000],
    margin: 30,
    behaviour: "drag",
    connect: true,
    range: {
      min: 0,
      max: 100000000,
    },
  });
  var limitFieldMin = document.getElementById("category-price-min");
  var limitFieldMax = document.getElementById("category-price-max");
  
  var updateCount = 0;
categoryPrice.noUiSlider.on("update", function (values, handle) {
  updateCount++;
  if (updateCount > 2) {
    (handle ? limitFieldMax : limitFieldMin).value = new Intl.NumberFormat("en").format(Number(values[handle])) + " تومان";
    setTimeout(function(){
      filterProducts();
    }, 2500);
  } else {
    // Skip the first update
    (handle ? limitFieldMax : limitFieldMin).value = new Intl.NumberFormat("en").format(Number(values[handle])) + " تومان";
  }
});
}
// Open Child Category Sidebar
const itemsSidebar = document.querySelectorAll(
  ".category-sidebar-box-items li.has-child span"
);
if (itemsSidebar.length > 0) {
  itemsSidebar.forEach((item) => {
    item.addEventListener("click", (ev) => {
      const el = ev.target,
        content = el.nextElementSibling,
        parent = el.parentElement;

      parent.classList.toggle("opened");

      if (parent.classList.contains("opened")) {
        content.style.height = content.scrollHeight + "px";

        setTimeout(() => {
          content.style.height = "auto";
        }, 300);
      } else {
        content.style.height = content.scrollHeight + "px";

        setTimeout(() => {
          content.style.height = 0;
        }, 10);
      }
    });
  });
}
// Sidebar Category
const btnOpenSidebarCategory = document.querySelector(".category-btn-filter"),
  sidebarCategory = document.querySelector(".category-sidebar"),
  backdropSidebarCategory = document.querySelector(
    ".category-sidebar-backdrop"
  );

if (btnOpenSidebarCategory) {
  btnOpenSidebarCategory.addEventListener("click", () => {
    sidebarCategory.classList.add("open");
  });

  backdropSidebarCategory.addEventListener("click", () => {
    sidebarCategory.classList.remove("open");
  });
}
jQuery('ul.category-sidebar-box-items li input').on('click', function(e) {
    e.preventDefault();
    jQuery(this).toggleClass('activeFilter');
    editFilterInputs(jQuery('#filters-category'), jQuery(this).attr('myid'));
    filterProducts();
});
function editFilterInputs(inputField, value) {
const currentFilters = inputField.val().split(',');
const newFilter = value.toString();

if (currentFilters.includes(newFilter)) {
  const i = currentFilters.indexOf(newFilter);
  currentFilters.splice(i, 1);
  inputField.val(currentFilters);
} else {
  inputField.val(inputField.val() + ',' + newFilter);
}
}
var checkBoxexit = document.getElementById("onlysale");
checkBoxexit.addEventListener('click', function(e){
filterProducts()
});
var checkBoxexit1 = document.getElementById("exists-products");
checkBoxexit1.addEventListener('click', function(e){
filterProducts()
});
function filterProducts() {
const catIds = jQuery('#filters-category').val().split(',');
const sortt = jQuery('.category-sort ul li input:checked').attr('id');
jQuery.ajax({
  url: ajaxurl, 
  type: 'post',
  data: {
    action: 'filter_kaveh',
    onsalee : jQuery('#onlysale').is(':checked'),
    onstock : jQuery('#exists-products').is(':checked'),
    pricemin : jQuery('.noUi-handle.noUi-handle-lower').attr('aria-valuenow'),
    pricemax : jQuery('.noUi-handle.noUi-handle-lower').attr('aria-valuemax'),
    catIds,
    sortt : sortt,
  },
  beforeSend: function(inum){
    jQuery('#woor').html('<div id="loading"></div>');
  },
  success: function(data) {
    jQuery('#woor').html(data);
    jQuery('.woocommerce-pagination.pg2').remove();
  },  
})
return false;
}


jQuery('li > #sort-2').click(function() {
  filterProducts();
})
jQuery('li > #sort-3').click(function() {
  filterProducts();
})
jQuery('li > #sort-4').click(function() {
  filterProducts();
})
jQuery('li > #sort-1').click(function() {
  filterProducts();
})

