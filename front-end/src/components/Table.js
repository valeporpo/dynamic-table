import React from 'react'
import Row from './Row'

export default function Table(props) {
    console.log(props)
    return (
      <div className="movie-table">
        {props.movies.map((movie) =>
            <Row movie={movie}
            />
        )}
      </div>  
      
    )
}