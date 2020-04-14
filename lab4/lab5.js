var direction = 1; //ascending - 1, descending - 0
var previousSortedColumn = 0;

function sort_table(tableId, column)
{
    if(previousSortedColumn === column)
    {
        if(direction == 1)
        {
            direction = 0;
        }
     else
        {
         direction = 1;
        }
    }
    else
    {
        direction = 1;
    }
    sort_table2(tableId, column);
    previousSortedColumn = column;
}

function sort_table2(tableId, column)
{
    var table, switched, i, rows, a, b = 0;
    switched = true;
    table = document.getElementById(tableId);

    while(switched)
    {
        switched = false;
        rows = table.rows;
        var nrOfSwitches = 0;
        for(i = 1;i < rows.length - 1;i++)
        {
            a = rows[i].getElementsByTagName("td")[column];
            b = rows[i+1].getElementsByTagName("td")[column];
            if(!isNaN(a.innerHTML))
            {
                if((direction == 1 && Number(a.innerHTML) > Number(b.innerHTML)) || (direction == 0 && Number(a.innerHTML) < Number(b.innerHTML)))
                {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switched = true;
                }
            }
            else
                if((direction == 1 && a.innerHTML.toLowerCase() > b.innerHTML.toLowerCase()) || (direction == 0 && a.innerHTML.toLowerCase() < b.innerHTML.toLowerCase()))
                {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switched = true;
                }
        }
        
    }
}
