// Global vars to hold the object in the panel.
tabPanelArray = new Array(4);
tabMenuArray = new Array(4);
currentMenuIndex = 0;

/**
 * This MUST be called on page load to fill up the shared global values.
 * Having the panes object accessible by index makes things easier.
 * This is also a good place to display the first page.
 */
function bodyOnLoad()
   {
   tabPanelArray[0] = getItemObj('panel0');
   tabPanelArray[1] = getItemObj('panel1');
   tabPanelArray[2] = getItemObj('panel2');
   tabPanelArray[3] = getItemObj('panel3');


   tabMenuArray[0] = getItemObj('menu0');
   tabMenuArray[1] = getItemObj('menu1');
   tabMenuArray[2] = getItemObj('menu2');
   tabMenuArray[3] = getItemObj('menu3');


   raisePanel ( currentMenuIndex );
   }

/**
 * Utility function just to show an error if I try to get non existen objects
 */
function getItemObj ( itemId )
   {
   obj = document.getElementById(itemId);

   if ( obj == null ) alert('Script Error: id='+itemId+' does not exist');

   return obj;
   }


/**
 * raising a panel means setting all the other panels to a lower level
 * and setting the raided panel to a higher level
 * note that also the size must be set correctly !
 * to activate a menu i switch the class between active and not active.
 */
function raisePanel ( panelIndex )
   {
   for (index=0; index<4; index++ )
      {
      // the panel with the index == wantedIndex gets raised.
      if (index == panelIndex )
         {
         //raiseObject (tabPanelArray[index], 4);TabbedPanelsContentVisibleTabbedPanelsContent
         //tabPanelArray[index].className = 'TabbedPanelsContentVisible';
         tabPanelArray[index].style.display = "inline";
         tabMenuArray[index].className = 'TabbedPanelsTab TabbedPanelsTabSelected';
         }
      else
         {
         //raiseObject (tabPanelArray[index], 2);
         //tabPanelArray[index].className = 'TabbedPanelsContentVisible';
	 tabPanelArray[index].style.display = "none";
         tabMenuArray[index].className = 'TabbedPanelsTab';
         }
      }
   currentMenuIndex=panelIndex;

   return true;
   }

/**
 * When I raise a panel I may as well check for the correct size and fix it.
 * it is a bit of doubling work, but it does not happens often !
 */
function raiseObject ( target, level )
   {
   /* the number of pixels we shave to the outside filler to fit everything in
    * this value depends on the border set for the filler div and possible padding
    * it is best to experiment a bit with it.
    */
   safeMargin = 6;

   // the size of the panels depends on the size of the tabFiller
   obj = getItemObj('tabFiller');

   newWidth = obj.offsetWidth - safeMargin;
   if ( newWidth < safeMargin ) newWidth = safeMargin;
   target.style.width = newWidth+'px';

   newHeight =obj.offsetHeight - safeMargin;
   if ( newHeight < safeMargin ) newHeight = safeMargin;
   target.style.height = newHeight+'px';

   // setting the z-index last should optimize possible resize.
   target.style.zIndex=level;
   }

/**
 * When we mouse out of the span we restore the class to the default value
 * But this only if we are not over the current selected menu
 */
function mouseOut ( menuIndex )
   {
   if ( menuIndex == currentMenuIndex ) return true;

   tabMenuArray[menuIndex].className = 'TabbedPanelsTab';
   }

/**
 * When we mouse over of the span we set the class of the span to the over one
 * But this only if we are not over the current selected menu
 */
function mouseOver ( menuIndex )
   {
   if ( menuIndex == currentMenuIndex ) return true;

   tabMenuArray[menuIndex].className = 'tabMenuOver';
   }
