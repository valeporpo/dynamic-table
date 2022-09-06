import React from 'react'

export default function Row(props) {

    return (
      <div className="movie-row">
        <div className="movie-row-image">
            <a href={"https://www.imdb.com/title/" + props.movie.imdb_ref_id}
               target="blank">
               <div>
                 <img src={props.movie.image}/>
               </div>
            </a> 
        </div>
        <div className="movie-row-title">
            {props.movie.title}
        </div>
        <div className="movie-row-year">
            {props.movie.year}
        </div>
        <div className="movie-row-rating">
            <span>{props.movie.rating}</span>
            <span>({props.movie.rank}°)</span>
        </div>
        <div className="movie-row-more-infos">
            More info
        </div>
      </div>
    )

}