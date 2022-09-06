import React from 'react'
import Table from './components/Table'

export default function App() {

  const [data, setData] = React.useState({
    loaded : false,
    data : null,
    error: false
  })

  React.useEffect(
      () => {
         fetch("http://localhost:3000/back-end/index.php")
           .then(data => data.json())
           .then((res) => {
              if(res.status === "success" && res.data) {
                setData(
                  { ...data,
                    loaded : true,
                    data : res.data }
                )
              } else {
                  setData(
                    { ...data,
                      error : true }
                  )
              }
         })
      }, []
  )

  if(data.error) { return('Some error occurred'); }
  if(!data.loaded) { return('Wait for a soon response'); }
  return (
      <Table movies={data.data}
      />
  );
}
