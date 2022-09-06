import React from 'react'

export default function TableHeader(props) {

    function changeOrder(event) {
        let direction = props.order.direction === "lowestToHighest" ?
                        "highestToLowest" : "lowestToHighest"
        props.handleOrder({
            key : event.target.dataset.column,
            direction : direction
        })
    }

    return (
      <div className="movie-row movie-row-header">
        <div className="movie-row-image">

        </div>
        <div data-column="title"
             className="movie-row-title filter"
             onClick={changeOrder}>
            Title
        </div>
        <div data-column="year"
             className="movie-row-year filter"
             onClick={changeOrder}>
            Year
        </div>
        <div data-column="rank"
             className="movie-row-rating filter"
             onClick={changeOrder}>
            Rating
        </div>
        <div className="movie-row-more-infos">
            More info
        </div>
      </div>
    )

}