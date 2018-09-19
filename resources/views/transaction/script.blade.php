<script>    
    function getTransactionID() {
        
        let transactionID = document.getElementById('transactionIDTxt').value;
        
        var xhttp = new XMLHttpRequest();

        var table = document.getElementById("transactionTable");
        var tr = document.createElement("tr");
        var td = document.createElement("td");

        let promptNoRecord = document.getElementById('promptNoRecord');
    
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let response = this.responseText;

                console.log('response: ' + response);
                if(response == "") {
                    var txt = document.createTextNode("There is no transaction with that ID.");                   
                    promptNoRecord.style.display = 'block';
                } else {
                  
                    let res = JSON.parse( response );
                    
                    if( res[0] == null) {
                        var txt = document.createTextNode("There is no transaction with that ID.");                   
                        promptNoRecord.style.display = 'block';
                    } else {
                        var cell = document.createElement("td");
                        var cellText = document.createTextNode(res[0].transaction_id);
                        cell.appendChild(cellText);
                        tr.appendChild(cell);

                        cell = document.createElement("td");
                        cellText = document.createTextNode(res[0].user_id);
                        cell.appendChild(cellText);
                        tr.appendChild(cell);

                        cell = document.createElement("td");
                        cellText = document.createTextNode(res[0].created_at);
                        cell.appendChild(cellText);
                        tr.appendChild(cell);

                        // cell = document.createElement("td");
                        // cellText = document.createTextNode(res[0].user_id);
                        // cell.appendChild(cellText);
                        // tr.appendChild(cell);
                            
                        table.appendChild(tr);
                    }
                }
            }      
        };
        
        if(transactionID !== "") {    
            xhttp.open('GET','http://dev.ccart.test/transactions/' + transactionID,true);
            xhttp.send();
        } else {
            promptNoRecord.style.display = 'none';
        }
    }
</script>