function showDiv(toggle){
    document.getElementById(toggle).style.display = 'block';
    }

function hideDiv(toggle){
  document.getElementById(toggle).style.display = 'none';
  }
//Systeme draggable image pour les ordres dans Instagrams

var listItems = document.querySelectorAll('.listItem');
var dragSrcEl = null;
function handleDragStart(e) {
  this.className += " dragStartClass";
  dragSrcEl = this;
  e.dataTransfer.effectAllowed = 'move';
  e.dataTransfer.setData('text/html', this.innerHTML);
  e.dataTransfer.setDragClass("dataTransferClass");

}
function handleDragOver(e) {
  e.preventDefault();
  e.dataTransfer.dropEffect = 'move'; 
  return false;
}

function handleDragEnter(e) {
  this.classList.add('over');
}
function handleDragLeave(e) {
  this.classList.remove('over');
}
function handleDrop(e) {
  var listItems = document.querySelectorAll('.listItem');
  e.stopPropagation(); 
  dragSrcOrderId = parseInt(dragSrcEl.getAttribute("order-id"));
  dragTargetOrderId = parseInt(this.getAttribute("order-id"));
  var tempThis = this;
  
  if (dragSrcEl != this) {
    var tempThis = this;
    function makeNewOrderIds(tempThis) {
      dragSrcEl.setAttribute("order-id", dragTargetOrderId);
      tempThis.setAttribute("order-id", dragTargetOrderId);
      if (dragSrcOrderId < dragTargetOrderId) {
        for (i = dragSrcOrderId + 1; i < dragTargetOrderId; i++) {
          listItems[i].setAttribute("order-id", i - 1);
          dragSrcEl.setAttribute("order-id", dragTargetOrderId - 1);
        }
      } else {
        for (i = dragTargetOrderId; i < dragSrcOrderId; i++) {
          listItems[i].setAttribute("order-id", i + 1);
          dragSrcEl.setAttribute("order-id", dragTargetOrderId);

        }
      }
    };
    makeNewOrderIds(tempThis);
    dragSrcEl.classList.remove("dragStartClass");
    reOrder(listItems);
  } else {

    dragSrcEl.classList.remove("dragStartClass");
    return false;
  }
};

function handleDragEnd(e) {
  for (i = 0; i < listItems.length; i++) {
    listItem = listItems[i];
    listItem.classList.remove('over');
  }
  dragSrcEl.classList.remove("dragStartClass");
}

for (i = 0; i < listItems.length; i++) {
  listItem = listItems[i];
  listItem.setAttribute("order-id", i);
  listItem.addEventListener('dragstart', handleDragStart, false)
  listItem.addEventListener('dragenter', handleDragEnter, false)
  listItem.addEventListener('dragover', handleDragOver, false)
  listItem.addEventListener('dragleave', handleDragLeave, false)
  listItem.addEventListener('drop', handleDrop, false)
  listItem.addEventListener('dragend', handleDragEnd, false)
}

function reOrder(listItems) {
  var tempListItems = listItems;
  tempListItems = Array.prototype.slice.call(tempListItems, 0);
  tempListItems.sort(function(a, b) {
    return a.getAttribute("order-id") - b.getAttribute("order-id");
  });
  var parent = document.getElementById('checklist');
  parent.innerHTML = "";
  for (var i = 0, l = tempListItems.length; i < l; i++) {
    parent.appendChild(tempListItems[i]);
  }
};

/*function showOne(){
  if (document.getElementById('listItems').style.display != "block") {
      document.getElementById('listItems').style.display = "block";
  };
}*/
// END Systeme draggable image pour les ordres dans Instagrams