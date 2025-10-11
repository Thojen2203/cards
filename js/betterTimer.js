function pad(n) {
return ('' + n).padStart(2, '0');
}

function formatTime(ms, units){
    const totalSeconds = Math.floor(ms / 1000);
    const days = Math.floor(totalSeconds / 86400);
    const hours = Math.floor((totalSeconds % 86400) / 3600);
    const minutes = Math.floor((totalSeconds % 3600) / 60);
    const seconds = totalSeconds % 60;

    switch(units){
        case 1:
            if(days > 0) return days + ' j';
            else if(hours > 0) return hours + ' h';
            else if(minutes > 0) return minutes + ' min';
            else return seconds + ' s';
        case 2:
            if(days > 0) return `${pad(days)} j ${pad(hours)} h`;
            else if (hours > 0) return `${pad(hours)} h ${pad(minutes)} min`;
            else if (minutes > 0) return `${pad(minutes)} min ${pad(seconds)} s`;
            else return `${pad(seconds)} s`;
        default:
            if(days > 0) return `${pad(days)} j ${pad(hours)} h ${pad(minutes)} min ${pad(seconds)} s`;
            else if (hours > 0) return `${pad(hours)} h ${pad(minutes)} min ${pad(seconds)} s`;
            else if (minutes > 0) return `${pad(minutes)} min ${pad(seconds)} s`;
            else return `${pad(seconds)} s`;
    }
}