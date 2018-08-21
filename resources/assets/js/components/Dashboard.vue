<script>
import * as d3 from "d3";
export default {
  props: ["attributes", "project-data", "user-data"],

  data() {
    return {
      project_data: this.projectData,
      user_data: this.userData
    };
  },

  mounted() {
    this.loadProjectChart();
    this.loadUserChart();
    console.log(this.project_data);
    console.log(this.user_data);
  },

  methods: {
    loadProjectChart() {
      const data = this.project_data;
      const margin = { top: 20, right: 30, bottom: 30, left: 40 },
        width = 960 - margin.left - margin.right,
        height = 500 - margin.top - margin.bottom;

      const barWidth = width / data.length;

      const x = d3
        .scaleBand()
        .range([0, width])
        .paddingInner(0.1);

      const y = d3.scaleLinear().range([height, 0]);

      const xAxis = d3.axisBottom().scale(x);

      const yAxis = d3.axisLeft().scale(y);

      const chart = d3
        .select(".project_chart")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
        .append("g")
        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

      x.domain(
        data.map(function(d) {
          return d.days;
        })
      );
      y.domain([
        0,
        d3.max(data, function(d) {
          return d.total_projects;
        })
      ]);

      chart
        .append("g")
        .attr("class", "x axis")
        .attr("transform", "translate(0," + height + ")")
        .call(xAxis);

      chart
        .append("g")
        .attr("class", "y axis")
        .call(yAxis);

      chart
        .selectAll(".bar")
        .data(data)
        .enter()
        .append("rect")
        .attr("class", "bar")
        .attr("x", function(d) {
          return x(d.days);
        })
        .attr("y", function(d) {
          return y(d.total_projects);
        })
        .attr("height", function(d) {
          return height - y(d.total_projects);
        })
        .attr("width", x.bandwidth());
    },

    loadUserChart() {
      const data = this.user_data;
      const margin = { top: 20, right: 30, bottom: 30, left: 40 },
        width = 960 - margin.left - margin.right,
        height = 500 - margin.top - margin.bottom;

      const barWidth = width / data.length;

      const x = d3
        .scaleBand()
        .range([0, width])
        .paddingInner(0.1);

      const y = d3.scaleLinear().range([height, 0]);

      const xAxis = d3.axisBottom().scale(x);

      const yAxis = d3.axisLeft().scale(y);

      const chart = d3
        .select(".user_chart")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
        .append("g")
        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

      x.domain(
        data.map(function(d) {
          return d.days;
        })
      );
      y.domain([
        0,
        d3.max(data, function(d) {
          return d.total_users;
        })
      ]);

      chart
        .append("g")
        .attr("class", "x axis")
        .attr("transform", "translate(0," + height + ")")
        .call(xAxis);

      chart
        .append("g")
        .attr("class", "y axis")
        .call(yAxis);

      chart
        .selectAll(".bar")
        .data(data)
        .enter()
        .append("rect")
        .attr("class", "bar")
        .attr("x", function(d) {
          return x(d.days);
        })
        .attr("y", function(d) {
          return y(d.total_users);
        })
        .attr("height", function(d) {
          return height - y(d.total_users);
        })
        .attr("width", x.bandwidth());
    }
  }
};
</script>