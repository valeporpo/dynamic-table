import React from 'react'
import Row from './Row'
import TableHeader from './TableHeader'

export default function Table(props) {
    
    const [movieFilter, setMovieFilter] = React.useState({
        props : "",
        value : ""
    })
    const [movieOrder, setMovieOrder] = React.useState({
        key : "rank",
        direction : "lowestToHighest"
    })
    console.log(props) 
    return (
      <div className="movie-table">
        <TableHeader handleOrder={setMovieOrder}
                     order={movieOrder}
        />  
        {props.movies
        .sort(function(a, b){
            if(typeof a[movieOrder.key] === "number") {
                return movieOrder.direction === "lowestToHighest" ? 
                       a[movieOrder.key]-b[movieOrder.key] :
                       b[movieOrder.key]-a[movieOrder.key]
            } else if(typeof a[movieOrder.key] === "string") {
                if(movieOrder.direction === "lowestToHighest")
                  return a[movieOrder.key] > b[movieOrder.key] ? 1 : (a[movieOrder.key] < b[movieOrder.key] ? -1 : 0)
                else
                  return a[movieOrder.key] > b[movieOrder.key] ? -1 : (a[movieOrder.key] < b[movieOrder.key] ? 1 : 0) 
            }
            
        })
        .map((movie) =>
            <Row movie={movie}
            />
        )}
      </div>  
      
    )
}