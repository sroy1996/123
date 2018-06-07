import React from 'react';
import ReactDom from 'react-dom';
class ShopItem extends React.Component{
	render(){
		return(
			<tr>
				<td>{this.props.value}</td>
				<td>g</td>
				</tr>
		)
	}
}

class App extends React.Component{
	constructor(props){
		super(props);
		this.state ={
			items:['ni','hao','r']
		};
		this.testClick = this.testClick.bind(this);
	}
	testClick(){
		const data = this.state.items;
		data.push('ooxx');
		
	}
	render(){
		return(
		<div>
			<table>
				<tbody>
				{this.state.items.map( item => ( <ShopItem value ={item} />))}					
				</tbody>
			</table>
			<button onClick={this.testClick}>按鈕</button>
		</div>
		)
	}
}

ReactDom.render(<App />,document.getElementById('root'));