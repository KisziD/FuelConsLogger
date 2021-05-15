var avgs=[];
var dists=[];
var ppkms=[];
var labels=[];
function loadData(){
    var rendsz = document.getElementById("carnplate").innerHTML.trim();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {          

            rows=this.responseText.split("|");
            rows.pop();
            count=0;
            for(i=0; i<rows.length;i++){
                if(rows[i].split(";")[5]==1){
                    count++;
                } 
            }
            var alert = document.getElementById("alert");
            if(count>=2){
               alert.style.display="none";
                avgs=[];
                dists=[];
                ppkms=[];
                labels=[];
               sum=0;
               distsum=0;
               kpsum=0;
               sumliter=0;
               sumkp=0;
               countkp=0;
               sumkm=0;
               if(rows[0].split(";")[5]==0){
                   i=2;
               }else{
                   i=1;
               }
               for(; i<rows.length;i++){
                   currdata=rows[i].split(";");
                   prevdata=rows[i-1].split(";");
                   dist=currdata[3]-prevdata[3];
                   if(currdata[5]==0){
                       sumkm+=dist;
                       sumliter+=parseFloat(currdata[0]);
                       sumkp+=parseFloat(currdata[1]);
                       countkp++;
                   }else{
                       sumkm+=dist;
                       sumliter+=parseFloat(currdata[0]);
                       sumkp+=parseFloat(currdata[1]);
                       countkp++;
                       avg=(sumliter/sumkm)*100; 
                       sum+=avg;
                       avgs.push(avg); 
                       dists.push(sumkm);
                       distsum+=sumkm;
                       ppkm=((sumkp/countkp)*avg)/100;
                       ppkms.push(ppkm);
                       kpsum+=ppkm;
                       labels.push(currdata[4]);
                       sumliter=0;
                       sumkm=0;
                       sumkp=0;
                       countkp=0;
                   }
                   
               }         
                myChart.data.datasets[0].data=avgs;;
                myChart.data.labels=labels;
               avg=sum/avgs.length;
               document.getElementById("avgconsumption").innerHTML="  "+avg.toFixed(2)+" L/100Km";
               avg=distsum/dists.length;
               document.getElementById("avgtravel").innerHTML="  "+avg.toFixed(2)+" Km";
               avg=kpsum/ppkms.length;
               document.getElementById("ftkm").innerHTML="  "+avg.toFixed(2)+" Ft/Km";
               myChart.update();
               
            }else{
                alert.style.display="block";
                alert.classList.add("carinfo");
                myChart.data.datasets[0].data=[];
                myChart.data.labels=[];
                myChart.update();
            }

            
        }
    };

    var url = "/PHP/Validate.php?getplatedata=" + rendsz;
    xhttp.open("GET", url, true);
    xhttp.send(null);

}


function setChartToPPKM() {
    myChart.data.datasets[0].data=ppkms;
    myChart.data.datasets[0].label="Ft/Km";
    myChart.update();
}

function setChartToTravel() {
    myChart.data.datasets[0].data=dists;
    myChart.data.datasets[0].label="Distance Between Full Tanks";
    myChart.update();
}

function setChartToCons() {
    myChart.data.datasets[0].data=avgs;
    myChart.data.datasets[0].label="Average Fuel Consumption";
    myChart.update();
}